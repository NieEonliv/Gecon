<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiPaintController;
use Illuminate\Console\Command;

class GetThemeDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:theme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        ApiPaintController::index();
    }
}
