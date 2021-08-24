<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barista extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'available' => 'boolean'
    ];

    public function scopeAvailableBarista($query, $index)
    {
        return $query->where('id', $index)
            ->where('available', true);
    }

    public function scopeNextAvailableBarista($query, $index, $count)
    {
        return $query->whereBetween('id', [$index, $count])
            ->where('available', true);
    }

    public function scopeNextInRow($query, $index)
    {
        return $query->where('id', $index);
    }
}
