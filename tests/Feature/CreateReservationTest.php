<?php


namespace Tests\Feature;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CreateReservationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_create_reservation(): void
    {
        $reservation = Reservation::factory()->make();

        dump($reservation->toArray());
        $response = $this->post('api/reservation', $reservation->toArray());


        $response->assertJson(fn(AssertableJson $json) => $json->has('id'));

    }


    public function test_start_cannot_be_after_end()
    {
        $reservation = Reservation::factory()->make([
            'start' => '2024-03-20 11:00:00',
            'end' => '2024-03-15 11:00:00'
            ]
        );

        $response = $this->post('api/reservation', $reservation->toArray(), [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(422);

    }
    public function test_create_reservation_overlap()
    {

        Reservation::factory()->create([
            'start' => '2024-03-15 11:00:00',
            'end' => '2024-03-20 11:00:00'
        ]);

        // start is in existing reservation
        $secondReservation = Reservation::factory()->make([
            'start' => '2024-03-15 11:00:00',
            'end' => '2024-03-21 11:00:00'

        ]);

        $response = $this->post('api/reservation', $secondReservation->toArray(), [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(409);


        $secondReservation = Reservation::factory()->make([
            'start' => '2024-03-11 11:00:00',
            'end' => '2024-03-17 11:00:00'
        ]);

        $response = $this->post('api/reservation', $secondReservation->toArray(), [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(409);

    }

    public function test_create_reservation_no_overlap()
    {

        Reservation::factory()->create([
            'start' => '2024-03-15 11:00:00',
            'end' => '2024-03-20 11:00:00'
        ]);

        $secondReservation = Reservation::factory()->make([
            'start' => '2024-03-22 11:00:00',
            'end' => '2024-03-25 11:00:00'

        ]);

        $response = $this->post('api/reservation', $secondReservation->toArray(), [
            'accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn(AssertableJson $json) => $json->has('id'));




    }
}
