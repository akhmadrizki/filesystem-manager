<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileDeleteRequest;
use App\Http\Requests\FileUploadRequest;
use App\Models\File;
use App\Supports\APIErrorResponse;
use App\Supports\APIMessageResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Upload a file
     *
     * @param \App\Http\Requests\FileUploadRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(FileUploadRequest $request)
    {
        /** @var \App\Models\Project $project */
        $project = $request->get('project');

        $file      = $request->file('file');
        $directory = $project->slug.'/'.$request->path;

        try {
            Storage::disk('s3')->putFile($directory, $file);

            $path = $request->path != '/' ? trim($request->path, '/') . '/' . $file->hashName() : $file->hashName();

            $uploadedFile = $project->files()->create([
                'name' => $file->hashName(),
                'path' => $path,
            ]);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('File uploaded successfully', [
            'id'        => $uploadedFile->id,
            'name'      => $uploadedFile->name,
            'file_type' => $file->getClientMimeType(),
            'path'      => $uploadedFile->path,
            'size'      => $file->getSize(),
            'url'       => route('presigned', ['file' => $uploadedFile->id]),
            'is_directory' => $file->isDir(),
            'last_modified' => $uploadedFile->created_at->toDateTimeString(),
        ])->send();
    }

    /**
     * Get the presigned URL for the file
     *
     * @param \Illuminate\Http\Request $request
     * @param string $file
     * @return \Illuminate\Http\RedirectResponse
     */
    public function presigned(Request $request, string $file)
    {
        $s3 = Storage::disk('s3');

        /** @var \League\Flysystem\AwsS3V3\AwsS3V3Adapter $adapter */
        $adapter   = $s3->getAdapter();
        $filePath  = File::find($file);

        $project = $filePath->project;
        $directory = $project->slug.'/'.trim($filePath->path, '/');

        return redirect($adapter->temporaryUrl($directory, Carbon::now()->addMinutes(5), new \League\Flysystem\Config()));
    }

    /**
     * Delete a file
     *
     * @param \App\Http\Requests\FileDeleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(FileDeleteRequest $request)
    {
        /** @var \App\Models\Project $project */
        $project = $request->project;
        $path    = $project->slug.'/'.$request->path;

        try {
            Storage::disk('s3')->delete($path);

            $project->files()->where('path', $request->path)->delete();
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('File deleted successfully')->send();
    }
}
