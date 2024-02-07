<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileDeleteRequest;
use App\Http\Requests\FileUploadRequest;
use App\Supports\APIErrorResponse;
use App\Supports\APIMessageResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(FileUploadRequest $request)
    {
        /** @var \App\Models\Project $project */
        $project = $request->get('project');

        $file      = $request->file('file');
        $directory = $project->slug.'/'.$request->path;

        try {
            $path = Storage::putFile($directory, $file);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('File uploaded successfully', [
            'name' => $file->getClientOriginalName(),
            'path' => $request->path.'/'.$file->hashName(),
            'url'  => route('presigned', ['file' => Crypt::encryptString($path)]),
        ])->send();
    }

    public function presigned(Request $request, string $file)
    {
        $s3 = Storage::disk('s3');

        /** @var \League\Flysystem\AwsS3V3\AwsS3V3Adapter $adapter */
        $adapter   = $s3->getAdapter();
        $decrypted = Crypt::decryptString($file);

        return redirect($adapter->temporaryUrl($decrypted, Carbon::now()->addMinutes(5), new \League\Flysystem\Config()));
    }

    public function delete(FileDeleteRequest $request)
    {
        /** @var \App\Models\Project $project */
        $project = $request->project;
        $path    = $project->slug.'/'.$request->path;

        try {
            Storage::disk('s3')->delete($path);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('File deleted successfully')->send();
    }
}
