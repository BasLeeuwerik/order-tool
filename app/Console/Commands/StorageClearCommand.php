<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class StorageClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $directories = Storage::allDirectories('public');

        foreach ($directories as $directory) {
            Storage::deleteDirectory($directory);
        }

        $this->line('Cleared storage folder successfully.');
    }
}
