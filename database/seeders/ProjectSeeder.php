<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['BeRest', 'Appmu', 'Waterbom'] as $project) {
            $accessToken = Str::random(32);
            $project     = Project::create([
                'name'         => $project,
                'slug'         => Str::slug($project),
                'access_token' => hash('sha256', $accessToken),
            ]);

            Log::info($project->slug, ['access_token', $accessToken]);

            Storage::makeDirectory($project->slug);
        }
    }
}
