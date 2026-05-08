<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Services
        $services = [
            [
                'title' => ['en' => 'Legal Translation', 'ar' => 'الترجمة القانونية'],
                'slug' => 'legal-translation',
                'description' => [
                    'en' => 'Certified legal translations for contracts, patents, and litigation documents with absolute precision.',
                    'ar' => 'ترجمة قانونية معتمدة للعقود وبراءات الاختراع ووثائق التقاضي بدقة مطلقة.'
                ],
                'icon' => 'heroicon-o-scale',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => ['en' => 'Medical Translation', 'ar' => 'الترجمة الطبية'],
                'slug' => 'medical-translation',
                'description' => [
                    'en' => 'Expert medical translations for pharmaceutical companies, hospitals, and clinical research.',
                    'ar' => 'ترجمة طبية متخصصة لشركات الأدوية والمستشفيات والأبحاث السريرية.'
                ],
                'icon' => 'heroicon-o-heart',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'Marketing & Transcreation', 'ar' => 'التسويق والترجمة الإبداعية'],
                'slug' => 'marketing-transcreation',
                'description' => [
                    'en' => 'Adapting your brand message to resonate culturally across world markets.',
                    'ar' => 'تكييف رسالة علامتك التجارية لتردد صداها ثقافياً في الأسواق العالمية.'
                ],
                'icon' => 'heroicon-o-megaphone',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => ['en' => 'Technical Translation', 'ar' => 'الترجمة التقنية'],
                'slug' => 'technical-translation',
                'description' => [
                    'en' => 'Accurate translation of manuals, engineering specs, and IT documentation.',
                    'ar' => 'ترجمة دقيقة للأدلة والمواصفات الهندسية ووثائق تكنولوجيا المعلومات.'
                ],
                'icon' => 'heroicon-o-cog',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }

        // 2. Testimonials
        $testimonials = [
            [
                'client_name' => ['en' => 'John Smith', 'ar' => 'جون سميث'],
                'client_title' => ['en' => 'CEO, Global Tech', 'ar' => 'الرئيس التنفيذي، غلوبال تيك'],
                'content' => [
                    'en' => 'LinguaVerse provided exceptional service. Their legal translations were flawless.',
                    'ar' => 'قدمت لينغوا فيرس خدمة استثنائية. كانت ترجماتهم القانونية خالية من العيوب.'
                ],
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }

        // 3. Blog Category
        $category = \App\Models\Category::create([
            'name' => ['en' => 'Industry News', 'ar' => 'أخبار الصناعة'],
            'slug' => 'industry-news',
        ]);

        // 4. Blog Post
        \App\Models\Post::create([
            'title' => ['en' => 'The Future of AI in Translation', 'ar' => 'مستقبل الذكاء الاصطناعي في الترجمة'],
            'slug' => 'future-ai-translation',
            'body' => ['en' => '<p>AI is changing the world...</p>', 'ar' => '<p>الذكاء الاصطناعي يغير العالم...</p>'],
            'category_id' => $category->id,
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}
