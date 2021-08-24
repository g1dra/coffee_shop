<?php

namespace App\Jobs;

use App\Models\Barista;
use App\Models\Coffee;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MakeCoffeeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $order;
    protected $barista;
    protected $coffee;

    public function __construct(Order $order, Barista $barista, Coffee $coffee)
    {
        $this->order = $order;
        $this->barista = $barista;
        $this->coffee = $coffee;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $total_time = 0;
        $refill_time = 120;

        if ($this->barista->coffee_grinder < $this->coffee->amount) {
            $total_time += $refill_time;
            sleep($refill_time);
        }

        $this->barista->busy();

        $total_time += $this->coffee->brew_time;
        sleep($this->coffee->brew_time);

        $this->order->update(['finished']);

        Log::notice("Barista made", [
            'coffee' => $this->coffee->id,
            'barista' => $this->barista->id,
            'total_time' => $total_time
        ]);
    }
}
