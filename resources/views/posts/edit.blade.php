@extends (config('genealabs-laravel-weblog.layout-view'))

@section ('content')
    <link rel="stylesheet" href="{{ elixir('css/app.css', 'vendor/genealabs/laravel-weblog') }}">
    <div class="container">
        <div class="media">
            <div class="media-left">
                <img class="img-circle media-object" src="{{ '//www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?s=60' }}">
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{ auth()->user()->name }}</h4>
                <p>{{ auth()->user()->bio }}</p>
                <p class="form-inline">
                    Draft
                    <small><em class="saving-indicator text-muted"></em></small>
                    <select id="category" class="pull-right">
                        @foreach ($post->all_categories as $category)
                            <option{{ $category === $post->category ? ' selected="selected"' : '' }}>{{ $post->category }}</option>
                        @endforeach
                    </select>
                    <label class="form-control-label pull-right">Category</label>
                </p>
            </div>
        </div>
        <h1 id="post-title" class="title-editable" data-placeholder="Title">{{ $post->title }}</h1>
    </div>

    <div class="container">
        <div id="post-image" class="image-editable" data-placeholder="Add a featured image ...">{!! $post->featured_media !!}</div>
    </div>

    <div class="container">
        <div class="clearfix p-t-1 m-b-2">
            <textarea id="post-content" class="body-editable form-control" data-placeholder="Tell your story...">{!! $post->content !!}</textarea>
        </div>
    </div>
    <script>
        window.csrfToken = '{{ csrf_token() }}';
        window.postUpdateUrl = '{{ route('posts.update', $post->id) }}';
        window.imageUploadUrl = '{{ route('genealabs-laravel-weblog-images.store') }}';
        window.imageUpdateUrl = '{{ route('genealabs-laravel-weblog-images.update', 0) }}';
        window.imageDeleteUrl = '{{ route('genealabs-laravel-weblog-images.destroy', $post->id) }}';
        window.tags = {!! $tags->toJson() !!}
    </script>
    <script src="{!! elixir('js/app.js', 'vendor/genealabs/laravel-weblog') !!}"></script>
@endsection
