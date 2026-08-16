<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0123456789',
            'password' => bcrypt('123456789'),
            'country_id' => 1,
            'city_id' => 1,
        ]);

    }
}
