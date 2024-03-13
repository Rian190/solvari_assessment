<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(Request $request)
    {

//        return($request->input());
//     return "HI";
        $validated = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'start' => 'date_format:Y-m-d H:i:s',
            'end' => 'date_format:Y-m-d H:i:s|after:start',
            'comments' => 'string'
        ]);

        if(Reservation::hasOverlap($validated['start'], $validated['end'])) {

            return response()->json(['error' => 'New reservation overlaps with existing reservations'], 409);
        }
        return response()->json(['id' => Reservation::create($validated)->id]);
    }

    public function destroy(Reservation $reservation, Request $request)
    {

        if($request->user()->cannot('delete', $reservation))
        {
            abort(403);

        };

        return $reservation->delete();

    }

}
