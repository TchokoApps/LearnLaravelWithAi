<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::query()->delete(); // Clear existing FAQs

        $faqs = [
            [
                'title' => 'Real-Time Expense Tracking:',
                'description' => 'Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Comprehensive Financial Overview:',
                'description' => 'Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Stress-Reducing Automation:',
                'description' => 'Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
