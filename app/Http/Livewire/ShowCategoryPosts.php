<?php

namespace App\Http\Livewire;

use App\Http\EditorParser;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;
use simplehtmldom\HtmlDocument;

class ShowCategoryPosts extends Component
{
    // public $title;

    use WithPagination;

    public $html;
    public $posts;
    public $category;

    public $perPage = 1;

    public $nextCursor;
    public $hasMorePages;
    public function route()
    {
        return Route::get('category/{slug}')
            ->name('show.category.posts');
    }

    public function mount($slug)
    {
        $this->posts = new Collection();
        
        try {
            $this->category = Category::where('slug', $slug)->first();

            // $this->posts = Post::where('category_id', $this->category->id)->paginate($this->perPage);
            $this->loadMore();
        }
        catch(\Exception $exception) {
            // return abort(404);
        }

        // dd($this->posts->hasMorePages());
    }

    public function loadMore()
    {
        if ($this->hasMorePages !== null  && !$this->hasMorePages) {
            return;
        }

        $posts = Post::where('category_id', $this->category->id)->paginate($this->perPage);
        $this->posts->pop($posts->items()); // МЕГАКОСТЫЛЬ
        $this->posts->push(...$posts->items());
        $this->hasMorePages = $posts->hasMorePages();

        foreach($this->posts as $post) {
            $this->html = EditorParser::parse($post['content'])->toHtml();

            // ищем первый параграф <p>
            $post['firstParagraph'] = (new HtmlDocument())->load($this->html)->find('p', 0)->innertext;

            if(isset((new HtmlDocument())->load($this->html)->find('img', 0)->src))
                $checkImage = (new HtmlDocument())->load($this->html)->find('img', 0)->src;
            else
                $checkImage = asset('storage/default.jpg');

            $post['firstImage'] = $checkImage;
        }

        $this->perPage += 1;
    }

    public function render()
    {
        // $this->posts = Post::paginate($this->perPage);

        return view('livewire.show-category-posts');
    }
}
