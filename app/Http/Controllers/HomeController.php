<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Article;
use App\Models\ArticlesCategory;

class HomeController extends Controller
{
    public function index() {
        $pageTitle = 'Main';
        $articles = Article::where('active', true)->latest('published_at')->paginate(6);

        return view('index', compact('articles', 'pageTitle'));
    }
}
