<main class="content">
    <!-- основной контент -->
    <div class="main-top-text">
        <h1>Новые статьи</h1>
        <p>Нажмите, прочитайте, запомните.</p>
    </div>

    <div class="main-content">
        <div>
            @for ($i = 0; $i < $page && $i < $maxPage; $i++)
                @livewire(
                    'post-list-items',
                    [
                        'postIds' => $postIdChunks[$i],
                    ],
                    key("chunk-{$queryCount}-{$i}")
                )
            @endfor
        </div>
        @if ($this->hasNextPage())
            <button wire:click.prevent="loadMore">Load post</button>
        @endif

        @if ($this->hasNextPage())
                <div x-data="{
                    init() {
                        let observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    @this.call('loadMore')
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
</main>
