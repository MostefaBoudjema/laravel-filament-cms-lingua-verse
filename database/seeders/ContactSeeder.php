<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+123456789',
            'subject' => 'Partnership Inquiry',
            'message' => 'Interested in a long-term translation partnership.',
            'is_read' => true,
        ]);
    }
}
