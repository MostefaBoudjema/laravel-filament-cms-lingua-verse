<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => ['en' => 'LinguaVerse', 'ar' => 'لينغوا فيرس'],
                'group' => 'general',
            ],
            [
                'key' => 'contact_email',
                'value' => ['en' => 'hello@linguaverse.com', 'ar' => 'hello@linguaverse.com'],
                'group' => 'contact',
            ],
            [
                'key' => 'office_address',
                'value' => [
                    'en' => 'One Luxury Plaza, Level 42, London, UK',
                    'ar' => 'وان لوكجري بلازا، الطابق 42، لندن، المملكة المتحدة'
                ],
                'group' => 'contact',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
