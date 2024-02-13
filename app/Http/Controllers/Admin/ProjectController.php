<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return inertia('admin.dashboard.project.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
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
}
