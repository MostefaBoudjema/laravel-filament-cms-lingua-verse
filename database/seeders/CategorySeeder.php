<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => ['en' => 'Industry Insights', 'ar' => 'رؤى الصناعة'], 'slug' => 'industry-insights'],
            ['name' => ['en' => 'Linguistic Trends', 'ar' => 'الاتجاهات اللغوية'], 'slug' => 'linguistic-trends'],
            ['name' => ['en' => 'Company News', 'ar' => 'أخبار الشركة'], 'slug' => 'company-news'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
