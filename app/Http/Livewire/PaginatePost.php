<?php

namespace App\Http\Livewire;

use App\Http\EditorParser;
use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

use simplehtmldom\HtmlDocument;

class PaginatePost extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $posts;

    public $html;

    public $firstParagraph;
    
    public $firstImage;

    public $nextCursor; // holds our current page position.
    public $hasMorePages; // Tells us if we have more pages to paginate.

    public $postCategory;
    public $postTags = [];

    public $hasTags = false;
    // public function route()
    // {
    //     return Route::get('categories/{slug}')
    //         ->name('show.category.posts');
    // }

    public function mount()
    {
        $this->posts = new Collection(); // initialize the data
        // dd($this->posts);

        $this->loadPosts(); // load the data
    }

    public function loadPosts()
    {
        if ($this->hasMorePages !== null  && !$this->hasMorePages) {
            return;
        }

        $posts = Post::cursorPaginate(
            2,
            ['*'],
            'cursor',
            Cursor::fromEncoded($this->nextCursor)
        );

        // dd($posts);

        
        $this->posts->push($posts->items());
        // Log::debug($this->posts);
        $this->hasMorePages = $posts->hasMorePages();
        if ($this->hasMorePages === true) {
            $this->nextCursor = $posts->nextCursor()->encode();
        }

        foreach($this->posts as $post) {
            Log::debug($post);

            $this->html = EditorParser::parse($post['content'])->toHtml();

            // ищем первый параграф <p>
            $post['firstParagraph'] = (new HtmlDocument())->load($this->html)->find('p', 0)->innertext;

            if(isset((new HtmlDocument())->load($this->html)->find('img', 0)->src))
                $checkImage = (new HtmlDocument())->load($this->html)->find('img', 0)->src;
            else
                $checkImage = asset('storage/default.jpg');

            $post['firstImage'] = $checkImage;
            
            $this->postCategory = isset($post->category['title']) ? $post->category['title'] : 'none';
            $this->postTags = isset($post->tags) ? $post->tags : $this->hasTags = true;
            // dd($post->category['title']);
        }
    }

    public function render()
    {
        return view('livewire.paginate-post');
    }
}