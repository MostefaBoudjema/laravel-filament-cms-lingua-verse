<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(4)->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order')->take(3)->get();
        $latestPosts = Post::where('is_published', true)->orderBy('published_at', 'desc')->take(3)->get();
        
        return view('home', compact('services', 'testimonials', 'latestPosts'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('services', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function quote()
    {
        return view('quote');
    }

    public function blog()
    {
        $posts = Post::where('is_published', true)->orderBy('published_at', 'desc')->paginate(9);
        return view('blog.index', compact('posts'));
    }

    public function blogPost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }
}
