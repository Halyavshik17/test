
<aside class="left-sidebar">
    <!-- левый сайдбар -->
    <div class="background-left">
    <p>Поиск по темам</p>
    </div>
    <div class="themes" style="overflow-y: auto; max-height: 42vh">
        <nav aria-label="Related Topics" class="sidebar-inner">
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route('show.category.posts', $category->slug) }}">{{ $category->title }}</a></li>
                    {{-- <li><a href="">{{ $category->title }}</a></li> --}}
                @endforeach
            </ul>
        </nav>
    </div>
    <div class="social-media">
        <div class="background-right">
            <p>Социальные сети</p>
        </div>
        <div class="social-media__ref">
            <ul>
                <li>Telegram</li> 
                <li>VK</li> 
            </ul>
        </div>
    </div>
</aside>
