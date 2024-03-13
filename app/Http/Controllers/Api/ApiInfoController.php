<?php

namespace App\Http\Controllers\Api;

class ApiInfoController
{

    public function index()
    {
        return [
            'api_name' => 'Solvari assessment',
            'version' => '0.0.1beta',
            'available_endpoints' => [
                'GET:up' => 'check if the application is running',
                'reservations' => [
                    'POST:api/reservation' => 'create a new reservation',
                    'DELETE:api/reservation/{reservation_id}' => 'delete a reservation. Only admins can delete a reservation. You need the bearer token'
                ]
            ]
        ];

    }
}
