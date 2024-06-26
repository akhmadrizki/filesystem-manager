<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryListRequest;
use App\Http\Resources\DirectoryListResource;
use App\Models\File;
use App\Supports\APIErrorResponse;
use App\Supports\APIMessageResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileAttributes;
use League\Flysystem\StorageAttributes;

class DirectoryController extends Controller
{
    public function contents(DirectoryListRequest $request)
    {
        $project  = $request->get('project');
        $contents = collect(Storage::listContents($project->slug.'/'.$request->path)
            ->map(function (StorageAttributes $attributes) use ($project) {
                $lastModified = $attributes->lastModified();

                return [
                    'name'          => basename($attributes->path()),
                    'path'          => ltrim($attributes->path(), $project->slug.'/'),
                    'file_type'     => $attributes instanceof FileAttributes ? Storage::mimeType($attributes->path()) : null,
                    'is_directory'  => $attributes->isDir(),
                    'size'          => $attributes instanceof FileAttributes ? $attributes->fileSize() : 0,
                    'last_modified' => ! is_null($lastModified) ? Carbon::createFromTimestamp($lastModified)->toDateTimeString() : null,
                ];
            })->toArray());

        $files = File::query()->whereIn('name', $contents->pluck('name'))->get(['id', 'name', 'path']);
        $contents = $contents->map(function ($content) use ($files, $project) {
            if ($content['is_directory'] === false) {
                $file = $files->firstWhere('name', $content['name']);

                if ($file instanceof File) {
                    $content['id']  = $file->id;
                    $content['url'] = route('presigned', ['file' => $file->id]);
                }
            } else {
                $directoryPath = $project->slug.'/'.$content['path'];
                $hasContent    = $this->checkDirectoryContent($directoryPath);

                $content['has_content']  = $hasContent;
            }

            return $content;
        });

        return DirectoryListResource::collection($contents);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'path' => ['required', 'string'],
        ]);

        $project       = $request->get('project');
        $directoryPath = $project->slug.'/'.$validated['path'];

        if (Storage::exists($directoryPath)) {
            return response()->json([
                'message' => 'Directory already exists.',
                'errors' => [
                    'path' => ['Directory already exists.']
                ]
            ], 422);
        }

        try {
            Storage::makeDirectory($directoryPath);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return JsonResource::make([
            'name'          => basename($validated['path']),
            'path'          => ltrim($validated['path'], $project->slug.'/'),
            'file_type'     => null,
            'is_directory'  => true,
            'size'          => 0,
            'last_modified' => null,
        ]);
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'path' => ['required', 'string', function ($attribute, $value, $fail) {
                if ($value === '/') {
                    $fail('The '.$attribute.' cannot be a forward slash.');
                }
            }],
        ]);

        $project = $request->get('project');

        try {
            Storage::deleteDirectory($project->slug.'/'.$validated['path']);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('Directory deleted successfully')->send();
    }

    protected function checkDirectoryContent($directoryPath)
    {
        $files          = Storage::allFiles($directoryPath);
        $subDirectories = Storage::allDirectories($directoryPath);

        return !empty($files) || !empty($subDirectories);
    }
}
