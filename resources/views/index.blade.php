@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="owl-carousel owl-theme home-slider">
                @foreach ($latestArticles as $article)
                    <div>
                        <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}"
                           class="a-block d-flex align-items-center height-lg"
                           style="background-image: url('{{ formatPath($article->detail_picture) }}'); ">
                            <div class="text half-to-full">
                                <span class="category mb-5">{{ $article->category->title }}</span>
                                <div class="post-meta">
                                    <span class="mr-2">{{ formatDate($article->published_at, 'LONG_DATE', 'en', true) }}</span>
                                </div>
                                <h3>{{ $article->title }}</h3>
                                <p>{!! $article->preview_text !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="row">

                        @foreach ($articles as $article)
                            <div class="col-md-6">
                                <a href="{{ route('article.show', [$article->category->slug, $article->slug]) }}"
                                   class="blog-entry element-animate fadeIn element-animated" data-animate-effect="fadeIn">
                                    <img src="{{ formatPath($article->preview_picture) }}" alt="{{ $article->title }}"
                                         style="width: 100%; max-height: 200px; object-fit: cover; object-position: center 30%">
                                    <div class="blog-content-body">
                                        <div class="post-meta">
                                            <span class="mr-2">{{ formatDate($article->published_at, 'LONG_DATE', 'en', true) }}</span>
                                        </div>
                                        <h2>{{ $article->title }}</h2>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            {{$articles->links('vendor.pagination.custom')}}
                        </div>
                    </div>

                </div>

                @include('blocks.right')

            </div>

        </div>
    </div>
@endsection
