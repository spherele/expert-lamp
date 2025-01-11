<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Article;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutContent = About::where('active', true)->firstOrFail();
        $pageTitle = 'About';
        $articles = Article::where('active', true)->orderBy('published_at', 'desc')->with('category')->paginate(3);


        return view('about.index', compact('aboutContent', 'pageTitle', 'articles'));
    }
}
