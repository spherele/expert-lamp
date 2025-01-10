@extends('layouts.main')

@section('content')

    <div class="row blog-entries element-animate fadeInUp element-animated">

        <div class="col-md-12 col-lg-8 main-content">
            <img src="{{ formatPath($articles->detail_picture) }}" alt="{{$articles->title}}" class="img-fluid mb-5" style="width: 100%; max-height: 486px; object-fit: cover; object-position: top">
            <div class="post-meta">
                <span class="mr-2">{{ formatDate($articles->published_at, 'LONG_DATE', 'en', true) }} </span>
            </div>
            <h1 class="mb-4">{{$articles->title}}</h1>
            <a class="category mb-5" href="{{route('article.list', $articles->category->slug)}}">{{ $articles->category->title}}</a>

            <div class="post-content-body" style="max-width: 730px;">
                {!! $articles->detail_text !!}
            </div>

            <div class="pt-5">
                <p>Tags:
                    @foreach ($articles->tags as $tag)
                        <a href="{{ route('article.search', ['query' => $tag]) }}">{{'#' . $tag}}</a>
                    @endforeach
                </p>
            </div>

        </div>

        @include('blocks.right')

    </div>
@endsection
