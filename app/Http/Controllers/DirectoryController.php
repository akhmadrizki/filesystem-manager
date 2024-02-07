<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryListRequest;
use App\Http\Resources\DirectoryListResource;
use App\Supports\APIErrorResponse;
use App\Supports\APIMessageResponse;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileAttributes;
use League\Flysystem\StorageAttributes;

class DirectoryController extends Controller
{
    public function contents(DirectoryListRequest $request)
    {
        $project  = $request->get('project');
        $contents = Storage::listContents($project->slug.'/'.$request->path)
            ->map(function (StorageAttributes $attributes) use ($project) {
                $lastModified = $attributes->lastModified();

                return [
                    'name'          => basename($attributes->path()),
                    'path'          => ltrim($attributes->path(), $project->slug.'/'),
                    'is_directory'  => $attributes->isDir(),
                    'size'          => $attributes instanceof FileAttributes ? $attributes->fileSize() : 0,
                    'last_modified' => ! is_null($lastModified) ? Carbon::createFromTimestamp($lastModified)->toDateTimeString() : null,
                ];
            })
            ->toArray();

        return DirectoryListResource::collection($contents);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'path' => ['required', 'string'],
        ]);

        $project = $request->get('project');

        try {
            Storage::makeDirectory($project->slug.'/'.$validated['path']);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('Directory created successfully')->send();
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'path' => ['required', 'string'],
        ]);

        $project = $request->get('project');

        try {
            Storage::deleteDirectory($project->slug.'/'.$validated['path']);
        } catch (Exception $e) {
            return APIErrorResponse::new($e)->send();
        }

        return APIMessageResponse::new('Directory deleted successfully')->send();
    }
}
