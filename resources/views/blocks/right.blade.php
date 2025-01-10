<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
        <form action="{{ route('article.search') }}" class="search-form" method="GET">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" name="query" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <!-- END sidebar-box -->
    <div class="sidebar-box">
        <div class="bio text-center">
            <div class="bio">
                <div class="bio-img" style="background-image: url('{{ asset('/assets/images/person_2.jpg') }}');"></div>
            </div>
            <img src="{{ asset('/assets/images/person_2.jpg') }}" alt="Image Placeholder" class="img-fluid">
            <div class="bio-body">
                <h2>Maxim Tolkachev</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt
                    repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias
                    minus.</p>
                <p><a href="{{ route('about') }}" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                <p class="social">
                    @foreach($socialLinks as $link)
                        <a href="{{ $link->url }}" class="p-2"><span class="{{ $link->icon }}"></span></a>
                    @endforeach
                </p>
            </div>
        </div>
    </div>
    <!-- END sidebar-box -->
    <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
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
    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach($list as $item)
                <li><a href="{{ route('article.list', $item->slug) }}">{{ $item->title }}<span>({{ $item->articles_count }})</span></a></li>
            @endforeach
        </ul>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading">Tags</h3>
        <ul class="tags">
            @foreach($articleTags as $item)
                <li><a href="{{ route('article.search', ['query' => $item]) }}">{{ '#' . $item }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
