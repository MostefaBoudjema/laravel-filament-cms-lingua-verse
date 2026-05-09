<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => ['en' => 'Legal Translation', 'ar' => 'الترجمة القانونية'],
                'slug' => 'legal-translation',
                'description' => ['en' => 'Certified legal translations for contracts and patents.', 'ar' => 'ترجمة قانونية معتمدة للعقود وبراءات الاختراع.'],
                'icon' => 'heroicon-o-scale',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => ['en' => 'Medical Translation', 'ar' => 'الترجمة الطبية'],
                'slug' => 'medical-translation',
                'description' => ['en' => 'Expert medical translations for healthcare providers.', 'ar' => 'ترجمة طبية متخصصة لمقدمي الرعاية الصحية.'],
                'icon' => 'heroicon-o-heart',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'Marketing & Transcreation', 'ar' => 'التسويق والترجمة الإبداعية'],
                'slug' => 'marketing-transcreation',
                'description' => ['en' => 'Cultural adaptation for global brand success.', 'ar' => 'التكيف الثقافي لنجاح العلامة التجارية عالمياً.'],
                'icon' => 'heroicon-o-megaphone',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => ['en' => 'Technical Translation', 'ar' => 'الترجمة التقنية'],
                'slug' => 'technical-translation',
                'description' => ['en' => 'Precise translation of engineering documentation.', 'ar' => 'ترجمة دقيقة للوثائق الهندسية.'],
                'icon' => 'heroicon-o-cog',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
