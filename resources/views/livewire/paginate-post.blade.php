<main class="content">
    <!-- основной контент -->
    <div class="main-top-text">
        <h1>Новые статьи</h1>
        <p>Нажмите, прочитайте, запомните.</p>
    </div>


    <div class="main-content">
        <div class="grid-container">
            @foreach ($posts as $post)
                <div class="grid-item">
                    <h6>Время: {{ $post['created_at'] }}</h6>
                    <img src="{{ $post['firstImage'] }}" alt="Image 1">
                    <h2>{{ $post['title'] }}</h2>
                    <p>{{ $post['firstParagraph'] }}</p>
                    {{-- <a class="btn-grid-ref" href="{{ route('show-post', $post['id']) }}">Читать дальше</a> --}}
                    <div class="frame">
                        <button class="custom-btn btn-3"><a class="btn-read-more"
                                href="{{ route('show-post', $post['slug']) }}">Читать далее</a></button>
                    </div>

                    <h6>Тема: {{ optional($post->category)->title }}</h6>
                    <h6>Теги: 
                        @foreach ($post->tags as $tag)
                            {{ optional($tag)->title }}
                        @endforeach
                    </h6>
                </div>
            @endforeach

            @if ($hasMorePages)
                <button wire:click.prevent="loadPosts">Load post</button>
            @endif

            @if ($hasMorePages)
                <div x-data="{
                    init() {
                        let observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    @this.call('loadPosts')
                                }
                            })
                        }, {
                            root: null
                        });
                        observer.POLL_INTERVAL = 100
                        observer.observe(this.$el);
                    }
                }" class="grid grid-cols-1 gap-8 mt-4 md:grid-cols-1 lg:grid-cols-1">
                </div>
            @endif
        </div>
    </div>
</main>
