<?php

namespace Helix\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class indexDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scout:index:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index using Laravel Scout all required Databases';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line("\nIndexing Projects:");
        Artisan::call('scout:import', ['model' => "Helix\Models\Project"]);
        $this->info(Artisan::output());

        $this->line("\nAlgolia Settings:");
        Artisan::call('algolia:settings:push', ['model' => "Helix\Models\Project"]);
        $this->info(Artisan::output());

        $this->line("\nIndexing Users:");
        $this->info("This operation will take several minutes.");
        Artisan::call('tntsearch:import', ['model' => "Helix\Models\Person"]);
        $this->info(Artisan::output());
    }
}
