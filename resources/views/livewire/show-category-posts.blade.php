<main class="content">
    <!-- основной контент -->
    <div class="main-top-text">
        <h1>Тема:</h1>
        <p>{{ $category->title }}</p>
    </div>


    <div class="main-content">
        <div class="grid-container">
            @foreach ($posts as $post)
                <div class="grid-item">
                    <img src="{{ $post['firstImage'] }}" alt="Image 1">
                    <h2>{{ $post['title'] }}</h2>
                    <p>{{ $post['firstParagraph'] }}</p>
                    {{-- <a class="btn-grid-ref" href="{{ route('show-post', $post['id']) }}">Читать дальше</a> --}}
                    <div class="frame">
                        <button class="custom-btn btn-3"><a class="btn-read-more"
                                href="{{ route('show-post', $post['slug']) }}">Читать далее</a></button>
                    </div>

                    {{-- <h1>{{ optional($post->category)->title }}</h1> --}}
                </div>
            @endforeach
        </div>

        @if ($hasMorePages)
            <button wire:click.prevent="loadMore">Load more</button>
        @endif

        {{-- <div
            x-data="{
                observe () {
                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                @this.call('loadMore')
                            }
                        })
                    }, {
                        root: null
                    })
        
                    observer.observe(this.$el)
                }
            }"
            x-init="observe"
        ></div> --}}
    </div>
</main>
