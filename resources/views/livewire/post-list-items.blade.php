<div class="grid-container">
@foreach ($posts as $post)
    <div class="grid-item">
        <h6>Время: {{ $post->created_at }}</h6>
        <img src="{{ $firstImage }}" alt="">
        <h2>{{ $post->title }}</h2>
        <p>{{ $firstParagraph }}</p>
        {{-- <a class="btn-grid-ref" href="{{ route('show-post', $post['id']) }}">Читать дальше</a> --}}
        <div class="frame">
            <button class="custom-btn btn-3"><a class="btn-read-more"
                    href="{{ route('show-post', $post->slug) }}">Читать далее</a></button>
        </div>

        {{-- <h6>Тема: {{ optional($post->category)->title }}</h6> --}}
        <h6>Тема: {{{ $post->category->title }}}</h6>
        <h6>Теги:
            @foreach ($post->tags as $tag)
                {{ optional($tag)->title }}
            @endforeach
        </h6>
    </div>
@endforeach
</div>