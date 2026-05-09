<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => ['en' => 'Sarah Johnson', 'ar' => 'سارة جونسون'],
                'client_title' => ['en' => 'Director of Legal Affairs, LexCorp', 'ar' => 'مديرة الشؤون القانونية، ليكس كورب'],
                'content' => [
                    'en' => 'The precision of their legal translations is unmatched. A vital partner for our global operations.',
                    'ar' => 'دقة ترجماتهم القانونية لا مثيل لها. شريك حيوي لعملياتنا العالمية.'
                ],
                'rating' => 5,
            ],
            [
                'client_name' => ['en' => 'Marc Dupont', 'ar' => 'مارك دوبونت'],
                'client_title' => ['en' => 'Marketing Manager, Paris Fashion', 'ar' => 'مدير التسويق، باريس فاشن'],
                'content' => [
                    'en' => 'Their transcreation services helped us capture the Middle Eastern market perfectly.',
                    'ar' => 'ساعدتنا خدمات الترجمة الإبداعية الخاصة بهم في الاستحواذ على سوق الشرق الأوسط بشكل مثالي.'
                ],
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
