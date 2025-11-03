<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * All HomePage Function Include
     * 
     */

    // Home One 
    public function indexOne(){
        $bodyClass = 'page-wrapper home-one';
        
        // Get latest 3 published blog posts
        $latestPosts = Post::with(['category', 'user'])
                          ->where('is_published', true)
                          ->whereNotNull('published_at')
                          ->orderBy('published_at', 'desc')
                          ->limit(3)
                          ->get();
        
        return view('frontend.homes.indexOne', compact('bodyClass', 'latestPosts'));
    }
    
}
