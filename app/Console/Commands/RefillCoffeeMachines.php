<?php

namespace App\Console\Commands;

use App\Models\Barista;
use Illuminate\Console\Command;

class RefillCoffeeMachines extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coffee:refill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refill coffee machines to 300 grams';

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
     * @return int
     */
    public function handle()
    {
        $response = Barista::query()->update(['available' => true]);
        $this->info('Coffee refiled successfully');
        return $response;
    }
}
