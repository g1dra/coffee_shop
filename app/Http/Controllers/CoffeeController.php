<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeePostRequest;
use App\Http\Resources\CoffeeResource;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoffeeController extends Controller
{
    public function index()
    {
        return CoffeeResource::collection(Coffee::all());
    }

    public function store(CoffeePostRequest $request)
    {

        $validated = $request->validated();
        $coffee = Coffee::create($validated);

        return (new CoffeeResource($coffee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($id)
    {
        //
    }

    // todo update validation
    public function update(Request $request, Coffee $coffee)
    {
        $coffee->update(
            $request->only(
                [
                    'type',
                    'price',
                    'picture',
                    'amount',
                    'brew_time'
                ]
            )
        );

        return new CoffeeResource($coffee);
    }

    public function destroy(Coffee $coffee)
    {
        $coffee->delete();

        return response()->json( null,
            Response::HTTP_NO_CONTENT);
    }
}
