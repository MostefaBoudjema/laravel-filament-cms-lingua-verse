<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => ['en' => 'AI', 'ar' => 'الذكاء الاصطناعي'], 'slug' => 'ai'],
            ['name' => ['en' => 'Future', 'ar' => 'المستقبل'], 'slug' => 'future'],
            ['name' => ['en' => 'Professional', 'ar' => 'احترافي'], 'slug' => 'professional'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
