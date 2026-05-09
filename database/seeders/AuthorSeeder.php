<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Dr. Elena Visconti',
            'bio' => ['en' => 'Lead Linguistic Strategist at LinguaVerse.', 'ar' => 'كبير الاستراتيجيين اللغويين في لينغوا فيرس.'],
        ]);

        Author::create([
            'name' => 'Ahmed Al-Mansour',
            'bio' => ['en' => 'Regional Director for Middle East & Africa.', 'ar' => 'المدير الإقليمي لمنطقة الشرق الأوسط وأفريقيا.'],
        ]);
    }
}
