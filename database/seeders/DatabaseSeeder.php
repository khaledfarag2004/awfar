<?php

namespace Database\Seeders;

use App\Models\Brand;
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
        $this->call(CitySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(BannerSeeder::class);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '500100100',
            'password' => bcrypt('123456789'),
            'verified' => true,
            'city_id' => 1,
            'type' => 'admin',
            'role' => 'admin',
        ]);

    }
}
