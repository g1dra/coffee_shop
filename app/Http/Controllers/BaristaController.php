<?php

namespace App\Http\Controllers;

use App\Models\Barista;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaristaController extends Controller
{
    public function store(Request $request)
    {
        $coffee = Barista::create($request->all());

        return response()->json($coffee, Response::HTTP_CREATED);
    }
}
