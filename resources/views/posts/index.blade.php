@extends (config('genealabs-laravel-weblog.layout-view'))

@section ('css')
    {{-- TODO: elixir() helper method is broken in L5.1 --}}
    <link rel="stylesheet" href="{{ asset('vendor/genealabs/laravel-weblog/css/app.css') }}">
@endsection

@section ('content')
    <div class="container">
        <h1 class="page-header">
            <a href="{{ route('posts.create') }}" class="btn btn-link pull-right">
                <i class="fa fa-btn fa-3x fa-lg fa-plus-circle"></i>
            </a>
            {{ config('genealabs-laravel-weblog.title') }}
        </h1>

        @foreach ($posts as $post)
            <div class="card {{ $post->published_at ? '' : 'bg-faded text-muted' }} m-t-1">
                <div class="card-block">
                    <p>
                        <small>
                            @if (auth()->check())
                                <a href="{{ route('posts.edit', $post->id) }}" class="pull-right btn btn-link {{ $post->published_at ? 'text-muted' : '' }}">
                                    <i class="fa fa-3x fa-edit"></i>
                                </a>
                            @endif

                            @if ($post->author)
                                <img class="img-circle pull-left m-r-1" src="{{ 'http://www.gravatar.com/avatar/' . md5($post->author->email) . '?s=48' }}">
                                <strong>{{ $post->author->name }}</strong>
                            @endif

                            @if ($post->category)
                                in {{ $post->category->title }}
                            @endif

                            <br>
                            <small class="text-muted">{{ $post->published_at ? $post->published_at->diffForHumans() : 'Draft' }} - {{ $post->readTime }} min read</small>
                        </small>
                    </p>
                    <h1 class="card-title {{ $post->featured_media ? 'm-b-0' : '' }}">

                        @if ($post->published_at)
                            <a href="{{ route('posts.show', $post->id) }}">
                        @endif

                        {{ $post->title }}

                        @if ($post->published_at)
                            </a>
                        @endif

                    </h1>

                @if ($post->featured_media)
                </div>
                <div class="featured-media embed-responsive embed-responsive-4by1">
                    <div class="embed-responsive-item">
                        {!! $post->featured_media ?? '' !!}
                    </div>
                </div>
                <div class="card-block">
                @endif

                    <div class="card-text">
                        {!! $post->excerpt !!}

                        @if ($post->published_at)
                            <small> | <a href="{{ route('posts.show', $post->id) }}">Read more...</a></small>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

        @if ($posts->isEmpty())
            <blockquote class="blockquote blockquote-reverse">
                <p>
                    The secret of getting ahead is getting started. The
                    <br>
                    secret of getting started is breaking your complex
                    overwhelming tasks into small manageable tasks, and then
                    starting on the first one.
                </p>
                <footer class="blockquote-footer">Mark Twain</footer>
            </blockquote>
        @endif

    </div>
@endsection
