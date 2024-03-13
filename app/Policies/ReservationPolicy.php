<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class ReservationPolicy
{
    public function delete(?User $user, Reservation $reservation): bool
    {
        return $user->isAdmin();
        //
    }

}
