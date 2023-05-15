<x-app-layout>
    <main class="content" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2)">
        {{-- <div class="blog-content"> --}}
            <!-- основной контент -->
            <div class="wrapper">
                <div class="article">
                    <h1>{{ $post->title }}</h1>
                    {!! $html !!}
                    <div class="ref-to-hp">
                        <a href="{{ route('index') }}">На главную страницу</a>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </main>
</x-app-layout>
