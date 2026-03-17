<?php

namespace Database\Seeders;

use App\Models\FeatureSection;
use Illuminate\Database\Seeder;

class FeatureSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_title' => 'Features that make spending smarter',
                'feature_title' => 'Expense Tracking',
                'feature_description' => 'Allows users to record and categorize daily transactions such as income, expenses, bills, and savings.',
                'feature_icon' => 'feature1.svg',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'section_title' => 'Features that make spending smarter',
                'feature_title' => 'Budgeting Tools',
                'feature_description' => 'Provides visual insights like graphs or pie charts to show how much is spent versus the budgeted amount.',
                'feature_icon' => 'feature2.svg',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'section_title' => 'Features that make spending smarter',
                'feature_title' => 'Investment Tracking',
                'feature_description' => 'For users interested in investing, finance apps often provide tools to track stocks, bonds or mutual funds.',
                'feature_icon' => 'feature3.svg',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'section_title' => 'Features that make spending smarter',
                'feature_title' => 'Tax Management',
                'feature_description' => 'This tool integrate with tax software to help users prepare for tax season, deduct expenses, and file returns.',
                'feature_icon' => 'feature4.svg',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'section_title' => 'Features that make spending smarter',
                'feature_title' => 'Bill Management',
                'feature_description' => 'Tracks upcoming bills, sets reminders for due dates, and enables easy payments via integration with online banking',
                'feature_icon' => 'feature5.svg',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'section_title' => 'Features that make spending smarter',
                'feature_title' => 'Security Features',
                'feature_description' => 'Provides bank-level encryption to ensure user data and financial information remain safe, MFA and biometric logins.',
                'feature_icon' => 'feature6.svg',
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            FeatureSection::create($section);
        }
    }
}
