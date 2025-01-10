<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticlesCategory;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('active', true)->orderBy('published_at', 'desc')->paginate(5);
        $pageTitle = 'Blog';
        return view('articles.index', compact('articles', 'pageTitle'));
    }

    public function list($category)
    {
        $category = ArticlesCategory::where('slug', $category)->firstOrFail();
        $articles = Article::where('active', true)->where('category_id', $category->id)->orderBy('published_at', 'desc')->paginate(5);
        $pageTitle = $category->title;

        return view('articles.index', compact('articles', 'category', 'pageTitle'));
    }

    public function show($category, $article) {
        $articles = Article::where('slug', $article)->firstOrFail();
        $pageTitle = $articles->title;

        return view('articles.show', compact('articles', 'pageTitle'));
    }

    public function tag($tag)
    {
        $articles = Article::where('active', true)->whereJsonContains('tags', $tag)->orderBy('published_at', 'desc')->paginate(5);

        return view('articles.index', compact('articles', 'tag'));
    }

    public function search(Request $request) {
        $query = $request->input('query');

        if (!$query || $query == '') {
            abort(404, 'No results found.');
        }

        $articles = Article::where('title', 'like', "%$query%")->orWhere('detail_text', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%')->paginate(4);

        return view('articles.index', compact('articles', 'query'));
    }
}
