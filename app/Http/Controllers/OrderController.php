<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Jobs\MakeCoffeeJob;
use App\Models\Barista;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{

    public function index()
    {
        //
    }

    // todo add resource + validation
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        $coffee = $order->coffee;

        $index = Cache::get('index');

        $count = Barista::count();

        $barista = $this->getBarista($index, $count);

        Cache::put('index', $barista->id ++ );

        MakeCoffeeJob::dispatch($order, $barista, $coffee);

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }


    public function show(Order $order)
    {
        //
    }


    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }

    public function storeCoffeeToGo(Request $request)
    {
        //
    }

    /**
     * @param $index
     * @param $count
     * @return mixed
     */
    public function getBarista($index, $count)
    {
        $barista = Barista::availableBarista($index)
        ->orWhere->nextAvailableBarista($index, $count) //
        ->orWhere->nextInRow($index)
            ->first();

        return $barista;
    }

}
