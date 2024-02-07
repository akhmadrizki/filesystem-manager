<?php

namespace App\Console\Commands\Ziggy;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Tightenco\Ziggy\Output\Types;
use Tightenco\Ziggy\Ziggy;

class TypeGenerator extends Command
{
    protected $signature = 'ziggy:type
                            {path? : Path to the generated TypeScript declaration file. Default: `resources/js/ziggy.js`.}
                            {--url=}
                            {--group=}';

    protected $description = 'Generate a TypeScript declaration file for Ziggy’s routes and configuration.';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $ziggy = new Ziggy($this->option('group'), $this->option('url') ? url($this->option('url')) : null);

        $this->makeDirectory(
            $path = $this->argument('path') ?? config('ziggy.output.path', 'resources/js/ziggy.js')
        );

        $types = config('ziggy.output.types', Types::class);

        $this->files->put(base_path(Str::replaceLast('.js', '.d.ts', $path)), new $types($ziggy));

        $this->info('Files generated!');
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname(base_path($path)))) {
            $this->files->makeDirectory(dirname(base_path($path)), 0755, true, true);
        }

        return $path;
    }
}
