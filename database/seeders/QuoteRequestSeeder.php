<?php

namespace Database\Seeders;

use App\Models\QuoteRequest;
use Illuminate\Database\Seeder;

class QuoteRequestSeeder extends Seeder
{
    public function run(): void
    {
        QuoteRequest::create([
            'name' => 'Alice Smith',
            'email' => 'alice@company.com',
            'company' => 'Global Solutions Inc.',
            'service_type' => 'Legal',
            'source_language' => 'English',
            'target_language' => 'Arabic',
            'message' => 'Need 50 contracts translated by next week.',
            'status' => 'new',
        ]);
    }
}
