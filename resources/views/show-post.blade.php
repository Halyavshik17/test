<x-app-layout>
    <main class="content">
        <!-- основной контент -->
        <div class="wrapper">
            <h1>{{ $post->title }}</h1>
                {!! $html !!}
            <a class="ref-to-hp" href="{{ route('index') }}">На главную страницу</a>
        </div>
    </main>
</x-app-layout>
