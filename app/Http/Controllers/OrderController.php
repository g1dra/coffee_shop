<?php

namespace App\Http\Controllers;

use App\Jobs\MakeCoffeeJob;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        MakeCoffeeJob::dispatch(); // will receive order and barista
        return response()->json($order, Response::HTTP_CREATED);
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

    public function coffeeToGo(Request $request)
    {
        //
    }

}
