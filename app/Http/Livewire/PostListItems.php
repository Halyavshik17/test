<?php

namespace App\Http\Livewire;

use App\Http\EditorParser;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use simplehtmldom\HtmlDocument;

class PostListItems extends Component
{
    public $postIds;

    public $postHtml, $firstParagraph, $firstImage;

    public function render()
    {
        $posts = Post::findOrFail($this->postIds)->keyBy('id');

        $orderedPosts = collect($this->postIds)->map(fn ($id) => $posts[$id]);

        foreach($orderedPosts as $post) {
            $postHtml = EditorParser::parse($post->content)->toHtml();

            // ищем первый параграф <p>
            $this->firstParagraph = (new HtmlDocument())->load($postHtml)->find('p', 0)->innertext;

            if(isset((new HtmlDocument())->load($postHtml)->find('img', 0)->src))
                $checkImage = (new HtmlDocument())->load($postHtml)->find('img', 0)->src;
            else
                $checkImage = asset('storage/default.jpg');

            $this->firstImage = $checkImage;
            
            // $this->postCategory = isset($post->category['title']) ? $post->category['title'] : 'none';
            // $this->postTags = isset($post->tags) ? $post->tags : $this->hasTags = true;
            // dd($post->category['title']);
        }

        return view('livewire.post-list-items', [
            'posts' => $orderedPosts,
        ]);
    }
}