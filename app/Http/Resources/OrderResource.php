<?php

namespace App\Http\Resources;

use App\Models\Coffee;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'coffee' => new CoffeeResource($this->coffee),
            'table_number' => $this->when($this->table_number, $this->table_number),
        ];
    }
}
