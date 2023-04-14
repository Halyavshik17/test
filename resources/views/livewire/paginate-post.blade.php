{{-- <main class="content"> --}}
<main class="view">
    <!-- основной контент -->
    <h1>Новые статьи</h1>
    <p>Нажмите, прочитайте, запомните.</p>
    <div class="feed-page">
        <div class="feed-page__content-list">
            {{-- <div class="main-content"> --}}
            {{-- <div class="grid-container"> --}}
            <div class="content-list">
                @foreach ($posts as $post)
                    {{-- <div class="grid-item"> --}}
                    <div class="content content--short" is-clickable>
                        <div class="content-header">
                            {{-- {{ $post['title'] }} --}}
                        </div>
                        <div class="content-title">
                            {{ $post['title'] }}
                        </div>
                        <article class="content__blocks">
                            <figure class="block-wrapper block-wrapper--default">
                                <div class="block-wrapper__content">
                                    <div class="block-text">
                                        {{ $post['firstParagraph'] }}
                                    </div>
                                </div>
                                <!---->
                            </figure>
                            <figure class="block-wrapper block-wrapper--media">
                                <div class="block-wrapper__content">
                                    <div class="block-media">
                                        <img src="{{ $post['firstImage'] }}" alt="Image 1">
                                    </div>
                                </div>
                                <!---->
                            </figure>
                        </article>
                        <div class="content-footer"><button class="like content-footer__item content-footer__item--like"
                                title="Лайк">
                                <div class="like__icon"><svg class="icon icon--like" height="20" width="20">
                                        <use xlink:href="#like"></use>
                                    </svg>
                                    <!---->
                                </div>
                                <div class="like__count">
                                    <div>256</div>
                                    <!---->
                                </div>
                            </button><a class="comments-counter comments-counter--default content-footer__item"
                                href="/post/1749628#comments">
                                <div class="comments-counter__icon-wrapper"><svg class="icon icon--comment"
                                        height="20" width="20">
                                        <use xlink:href="#comment"></use>
                                    </svg></div><span class="comments-counter__label">157
                                    <!---->
                                </span>
                            </a><button class="bookmark-button" title="Добавить в закладки"><svg
                                    class="icon icon--bookmark" height="20" width="20">
                                    <use xlink:href="#bookmark"></use>
                                </svg>
                                <!---->
                            </button>
                            <div class="content-footer__space"></div><button
                                class="dislike content-footer__item content-footer__item--dislike" title="Дизлайк">
                                <div class="dislike__icon"><svg class="icon icon--vote_down" height="20"
                                        width="20">
                                        <use xlink:href="#vote_down"></use>
                                    </svg>
                                    <!---->
                                </div><span class="dislike__count"></span>
                            </button>
                        </div>
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
