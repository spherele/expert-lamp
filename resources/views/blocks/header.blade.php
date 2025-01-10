<header role="banner">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 social">
                    @foreach ($socialLinks as $link)
                        <a href="{{ $link->url }}" target="_blank">
                            <span class="{{ $link->icon }}"></span>
                        </a>
                    @endforeach
                </div>
                <div class="col-3 search-top">
                    <form action="{{ route('article.search') }}" class="search-top-form">
                        <span class="icon fa fa-search"></span>
                        <input type="text" name="query" placeholder="Type keyword to search...">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                <h1 class="site-logo"><a href="{{ route('home') }}">Wordify</a></h1>
            </div>
        </div>
    </div>

    @include('blocks.menu')
</header>
