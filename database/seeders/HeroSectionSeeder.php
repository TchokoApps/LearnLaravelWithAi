<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'title' => 'Manage your finances more effectively',
            'description' => 'Track your daily finances automatically. Manage your money in a friendly & flexible way, making it easy to spend guilt-free.',
            'button_text' => 'Create a free account',
            'button_url' => '/sign-up',
            'hero_image' => null,
            'hero_shape' => null,
        ]);
    }
}

