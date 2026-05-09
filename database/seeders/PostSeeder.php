<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\Author;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();
        $author = Author::first();
        $tags = Tag::all();

        $post = Post::create([
            'title' => ['en' => 'The Future of AI in Professional Translation', 'ar' => 'مستقبل الذكاء الاصطناعي في الترجمة الاحترافية'],
            'slug' => 'future-ai-translation',
            'body' => [
                'en' => '<p>AI is transforming the industry...</p>',
                'ar' => '<p>الذكاء الاصطناعي يغير الصناعة...</p>'
            ],
            'category_id' => $category->id,
            'author_id' => $author->id,
            'is_published' => true,
            'published_at' => now(),
        ]);

        $post->tags()->attach($tags->pluck('id'));
    }
}
