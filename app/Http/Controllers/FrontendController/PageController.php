<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PageController extends Controller
{
    // About 
    public function about(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.about', compact('bodyClass'));
    }
    // Faqs 
    public function faqs(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.faqs', compact('bodyClass'));
    }
    // Team 
    public function team(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.team', compact('bodyClass'));
    }
    // Pricing 
    public function pricing(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.pricing', compact('bodyClass'));
    }
    // Contact
    public function contact(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.contact', compact('bodyClass'));
    }
    // signIn 
    public function signIn(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.signIn', compact('bodyClass'));
    }
    // signUp 
    public function signUp(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.signUp', compact('bodyClass'));
    }
    // comingSoon 
    public function comingSoon(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.comingSoon', compact('bodyClass'));
    }
    // Services 
    public function services(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.services', compact('bodyClass'));
    }
    // serviceDetails 
    public function serviceDetails(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.serviceDetails', compact('bodyClass'));
    }
    // shop 
    public function shop(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.shop', compact('bodyClass'));
    }
    // productDetails 
    public function productDetails(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.productDetails', compact('bodyClass'));
    }
    // cart 
    public function cart(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.cart', compact('bodyClass'));
    }
    // checkout 
    public function checkout(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.checkout', compact('bodyClass'));
    }
    // projects 
    public function projects(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.projects', compact('bodyClass'));
    }
    // projectList 
    public function projectList(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.projectList', compact('bodyClass'));
    }
    // projectMasonry 
    public function projectMasonry(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.projectMasonry', compact('bodyClass'));
    }
    // projectDetails 
    public function projectDetails(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.projectDetails', compact('bodyClass'));
    }
    // blog 
    public function blog(Request $request){
        $bodyClass = 'page-wrapper';
        $query = Post::with(['category', 'user', 'tags'])
                    ->where('is_published', true)
                    ->whereNotNull('published_at');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        // Tag filter
        if ($request->has('tag') && $request->tag != '') {
            $query->whereHas('tags', function($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }
        
        $posts = $query->orderBy('published_at', 'desc')->paginate(9);
        
        $categories = Category::withCount('posts')->get();
        $popularTags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get();
        $recentPosts = Post::where('is_published', true)
                          ->whereNotNull('published_at')
                          ->orderBy('published_at', 'desc')
                          ->limit(3)
                          ->get();
        
        return view('frontend.pages.blog', compact('bodyClass', 'posts', 'categories', 'popularTags', 'recentPosts'));
    }
    // blogDetails 
    public function blogDetails(Post $post){
        $bodyClass = 'page-wrapper';
        // Ensure only published posts are viewable
        if (! $post->is_published || is_null($post->published_at)) {
            abort(404);
        }
        $post->load(['category', 'user', 'tags']);
        
        // Increment views
        $post->increment('views');
        
        $categories = Category::withCount('posts')->get();
        $popularTags = Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get();
        $recentPosts = Post::where('is_published', true)
                          ->whereNotNull('published_at')
                          ->where('id', '!=', $post->id)
                          ->orderBy('published_at', 'desc')
                          ->limit(3)
                          ->get();
        
        // Get next and previous posts
        $nextPost = Post::where('is_published', true)
                       ->whereNotNull('published_at')
                       ->where('published_at', '>', $post->published_at)
                       ->orderBy('published_at', 'asc')
                       ->first();
        
        $prevPost = Post::where('is_published', true)
                       ->whereNotNull('published_at')
                       ->where('published_at', '<', $post->published_at)
                       ->orderBy('published_at', 'desc')
                       ->first();
        
        return view('frontend.pages.blogDetails', compact('bodyClass', 'post', 'categories', 'popularTags', 'recentPosts', 'nextPost', 'prevPost'));
    }
    // errorPage 
    public function errorPage(){
        $bodyClass = 'page-wrapper';
        return view('frontend.pages.errorPage', compact('bodyClass'));
    }
}
