<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin'
        ]);

        PersonalAccessToken::create([
            'tokenable_type' => User::class,
            'tokenable_id' => $user->id,
            'name' => 'seed',
            'token' => '145ed5bc30ed423fad24404f13235a474b4d3154daa9e8ffe5fe948bfbc8f257',
            'abilities' => ["*"]

        ]);

        echo('bearer: 1|0DOVr7AaZTgeMidkd4yVN5xmgkz5f2S2JmQ1Dd6ke4ae15fc');

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
        ]);

        Reservation::factory()->create();
    }
}
