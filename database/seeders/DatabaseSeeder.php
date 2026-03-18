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

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'photo' => null,
            'phone' => null,
            'address' => null,
            'role' => 'admin',
            'status' => 1,
        ]);

        $this->call(TestimonialSeeder::class);
        $this->call(HeroSectionSeeder::class);
        $this->call(FeatureSectionSeeder::class);
        $this->call(FaqSeeder::class);
    }
}
