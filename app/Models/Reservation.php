<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public static function hasOverlap($newStart, $newEnd)
    {
        return static::where(function ($query) use ($newStart, $newEnd) {
            $query->where('start', '<', $newEnd)
                ->where('end', '>', $newStart);
        })->exists();
    }
}
