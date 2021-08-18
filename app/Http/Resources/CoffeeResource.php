<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoffeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'price' => $this->price,
            'picture' => asset('/storage/'. $this->picture),
            'amount' => $this->amount,
            'brew_time' => $this->brew_time,
        ];
    }
}
