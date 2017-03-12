<?php

namespace App\Http\Controllers;

use App\Post;
use App\Resolvers\PostResolver;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class PagesController extends Controller
{
    public function templatesList()
    {
        $list = [
            'about',
            'category',
            'contact',
            'index',
            'list',
            'single-audio',
            'single-gallery',
            'single-standard',
            'single-video',
            'style-guide'
        ];
        
        return view('templates.list', compact('list'));
    }
    
    public function templatePage($page)
    {
        if($page == "list") return $this->templatesList();
        
        return view('templates.' . $page);
    }
    
    public function siteIndex()
    {
        $posts = Post::with('tags', 'author', 'attachment')->paginate(15);
        
        return view('pages.index', compact('posts'));
    }
}
