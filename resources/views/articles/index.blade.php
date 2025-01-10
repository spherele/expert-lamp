@extends('layouts.main') @section('content')


    @if(isset($category))
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4">Category: {{ $category->title }}</h2>
            </div>
        </div>
    @endif

    @if(isset($tag))
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4">Tag: {{ $tag }}</h2>
            </div>
        </div>
    @endif

    @if(isset($query))
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4">Search: {{ $query }}</h2>
            </div>
        </div>
    @endif

    @if(isset($query) && count($articles) == 0)
        <div class="not-found">
            <p>
                <span class="icon">🔍</span>
                No results found for <strong>"{{ $query }}"</strong>. Please try another search.
                <span class="sad-face">😔</span>
            </p>
        </div>

    @endif

    <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">
                <div class="col-md-12">
                    @foreach($articles as $item)
                        <div class="post-entry-horzontal">
                            <a href="{{ route('article.show', [$item->category->slug, $item->slug]) }}" style="width: 100%;">
                                <div
                                    class="image element-animate fadeIn element-animated"
                                    data-animate-effect="fadeIn"
                                    style="
                                        background-image: url({{ formatPath($item->preview_picture) }});
                                        background-position: center 30%;"
                                ></div>
                                <span class="text">
                                    <div class="post-meta">
                                        <span class="mr-2">{{ formatDate($item->published_at, 'LONG_DATE', 'en', true) }}</span>•
                                        <span class="mr-2">{{ $item->category->title }}</span>
                                    </div>
                                    <h2>{{ $item->title }}</h2>
                                    <div class="post-meta">
                                        <div class="mr-2 post-meta__description-text">{{ $item->preview_text }}</div>
                                    </div>
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    {{ $articles->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>

        @include('blocks.right')
    </div>
@endsection
