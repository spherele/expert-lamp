<nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.list', 'research-articles') }}">Research articles</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('article.index') }}" id="dropdown05" aria-haspopup="true" aria-expanded="false">Articles</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                        @foreach($list as $item)
                            <a class="dropdown-item" href="{{ route('article.list', $item->slug) }}">{{ $item->title }}</a>
                        @endforeach
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
