<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectListResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $projects = Project::query()
                    ->filter()
                    ->paginate(10);

        return inertia('admin.dashboard.project.index', [
            'projects' => ProjectListResource::collection($projects),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:projects,name',
        ]);

        DB::transaction(function () use ($request) {
            $token   = Str::random(32);
            $project = Project::create([
                'name'         => $request->name,
                'slug'         => Str::slug($request->name),
                'token'        => $token,
                'access_token' => hash('sha256', $token),
            ]);

            Storage::makeDirectory($project->slug);
        });

        return back();
    }

    /**
     * Update the token.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function regenerate(Request $request, Project $project)
    {
        $token       = Str::random(32);
        $hashedToken = hash('sha256', $token);

        $project->update([
            'token'        => $token,
            'access_token' => $hashedToken,
        ]);

        return back();
    }
}
