@extends('layouts.main')

@section('content')
    <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">{{ $aboutContent->title }}</h2>
                    <p class="mb-5"><img src="{{ formatPath($aboutContent->image) }}" alt="Image placeholder"
                                         class="img-fluid"></p>
                    {!! $aboutContent->content !!}
                </div>
            </div>

            <div class="row mb-5 mt-5">
                <div class="col-md-12 mb-5">
                    <h2>Latest Posts</h2>
                </div>
                <div class="col-md-12">
                    @foreach($articles as $item)
                        <div class="post-entry-horzontal">
                            <a href="{{ route('article.show', [$item->category->slug, $item->slug]) }}" style="width: 100%">
                                <div class="image" style="background-image: url({{ formatPath($item->preview_picture) }});"></div>
                                <span class="text">
                                    <div class="post-meta">
                                        <span class="mr-2">{{ formatDate($item->published_at, 'LONG_DATE', 'en', true) }}</span>
                                    </div>
                                    <h2>{{ $item->title }}</h2>
                                    <div class="post-meta__description-text">
                                        {{ $item->preview_text }}
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
