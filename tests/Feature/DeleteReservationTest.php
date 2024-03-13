<?php


namespace Feature;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteReservationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_delete_reservation_as_guest(): void
    {
        $reservation = Reservation::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->delete('api/reservation/'. $reservation->id, [], [
            'accepts' => 'application/json'
        ]);

        $response->assertStatus(403);

    }
    public function test_delete_reservation_as_admin(): void
    {
        $reservation = Reservation::factory()->create();
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $this->actingAs($user);

        $response = $this->delete('api/reservation/'. $reservation->id, [], [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);

    }


}
