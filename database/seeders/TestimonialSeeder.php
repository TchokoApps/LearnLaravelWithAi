<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'text' => 'This app transformed my budgeting! It has been a clear view of my finances. I no longer have to worry about tracking expenses and savings goals.',
                'image' => null,
                'name' => 'Liam Gallagher',
                'title' => 'Teacher at Luxe Escapes Hotels'
            ],
            [
                'text' => 'The interface is intuitive, and I love how it syncs with my bank accounts. I no longer have to worry about manual tracking. Highly recommend!',
                'image' => null,
                'name' => 'Michael Chen',
                'title' => 'Founder of EcoChic Apparel'
            ],
            [
                'text' => 'With this app, I\'ve been able to stick to my budget and even save for a vacation. The budget alerts are a game changer!',
                'image' => null,
                'name' => 'David Nguyen',
                'title' => 'COO of Luxe Escapes Hotels'
            ],
            [
                'text' => 'Having all my accounts in one place gives me complete control over my money. So user-friendly and incredibly helpful!',
                'image' => null,
                'name' => 'Rachel Kim',
                'title' => 'CEO of GreenLeaf Organics'
            ],
            [
                'text' => 'Finally, a financial app that actually understands my needs. The real-time notifications keep me informed every step of the way. Excellent!',
                'image' => null,
                'name' => 'Aisha Hassan',
                'title' => 'CEO of RoyexLeaf Organics'
            ],
            [
                'text' => 'I\'ve tried many budgeting apps, but this one is by far the best. The visual reports make it easy to understand my spending patterns.',
                'image' => null,
                'name' => 'James Wilson',
                'title' => 'Director of Finance at TechCorp'
            ],
            [
                'text' => 'This app saved me hundreds of dollars in the first month! The spending insights and recommendations are incredibly valuable.',
                'image' => null,
                'name' => 'Sofia Rodriguez',
                'title' => 'Marketing Manager at Digital Studios'
            ],
            [
                'text' => 'As a freelancer, managing multiple income streams was chaotic. This app brought order to my financial life. Game-changing!',
                'image' => null,
                'name' => 'Marcus Thompson',
                'title' => 'Freelance Developer'
            ],
            [
                'text' => 'The customer support team is phenomenal, and the app itself is robust. I\'ve recommended it to all my colleagues and friends.',
                'image' => null,
                'name' => 'Emma Johnson',
                'title' => 'Senior Accountant at PriceCorp'
            ],
            [
                'text' => 'Five stars! This app makes financial planning accessible and stress-free. If you\'re serious about your money, get this app now!',
                'image' => null,
                'name' => 'Alex Turner',
                'title' => 'Business Owner at Turner Enterprises'
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
