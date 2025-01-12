<footer class="site-footer">
    <div class="container">
        <div class="row mb-0">
            <div class="col-md-4">
                <h3>About Me</h3>
                <p class="mb-4">
                    <img src="{{ formatPath($aboutInfo->preview_picture) }}" alt="{{ $aboutInfo->title }}" class="img-fluid">
                </p>

                <p>{{ $aboutInfo->preview_text }}<a href="{{ route('about') }}"> Read More</a></p>
            </div>
            <div class="col-md-6 ml-auto">
                <div class="row">
                    <div class="col-md-7">
                        <h3>Latest Post</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach($latestArticles as $item)
                                <li>
                                    <a href="{{ route('article.show', [$item->category->slug, $item->slug]) }}">
                                        <img src="{{ formatPath($item->preview_picture) }}" alt="{{ $item->title }}" class="mr-4">
                                        <div class="text">
                                            <h4>{{ $item->title }}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">{{ formatDate($item->published_at, 'LONG_DATE', 'en', true) }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-4">

                        <div class="mb-5">
                            <h3>Quick Links</h3>
                            <ul class="list-unstyled">
                                @foreach($list as $item)
                                    <li><a href="{{ route('article.list', $item->slug) }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mb-0">
                            <h3>Social</h3>
                            <ul class="list-unstyled footer-social">
                                @foreach ($socialLinks as $link)
                                    <li><a href="{{ $link->url }}"><span class="{{ $link->icon }}"></span>{{ $link->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
