<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\ArticlesCategory;
use App\Models\SocialLink;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('socialLinks', SocialLink::all());
        });

        view()->composer('*', function ($view) {
            $list = ArticlesCategory::where('active', true)->get();
            $article = Article::get();
            $latestArticles = Article::latest('published_at')->take(3)->get();
            $articleTags = Article::whereNotNull('tags')->pluck('tags')->flatten()->unique();

            $view->with(
                [
                    'list' => $list,
                    'article' => $article,
                    'latestArticles' => $latestArticles,
                    'articleTags' => $articleTags,
                ]
            );
        });
    }
}