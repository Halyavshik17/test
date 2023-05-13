<?php

namespace App\Http\Livewire;

use App\Http\EditorParser;
use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
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

    public function route()
    {
        return Route::get('categories/{slug}')
            ->name('show.category.posts');
    }

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
            6,
            ['*'],
            'cursor',
            Cursor::fromEncoded($this->nextCursor)
        );
        $this->posts->push(...$posts->items());
        $this->hasMorePages = $posts->hasMorePages();
        if ($this->hasMorePages === true) {
            $this->nextCursor = $posts->nextCursor()->encode();
        }

        foreach($this->posts as $post) {
            $this->html = EditorParser::parse($post['content'])->toHtml();

            // ищем первый параграф <p>
            $post['firstParagraph'] = (new HtmlDocument())->load($this->html)->find('p', 0)->innertext;

            if(isset((new HtmlDocument())->load($this->html)->find('img', 0)->src))
                $checkImage = (new HtmlDocument())->load($this->html)->find('img', 0)->src;
            else
                $checkImage = '/default';

            $post['firstImage'] = $checkImage;
        }
    }

    public function render()
    {
        return view('livewire.paginate-post');
    }
}