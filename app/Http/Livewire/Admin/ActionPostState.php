<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use App\Http\EditorParser;

class ActionPostState extends Component
{
    public $posts;

    public $html;

    // public $content;

    public function render()
    {
        $this->posts = Post::all();

        foreach($this->posts as $post) {
            // dd($post->content);
            // $this->html = Parser::parse($post->content)->toHtml();
            $this->html = EditorParser::parse($post->content)->getBlocks();

            // dd($this->html->type);

            // dd($this->html);
        }
        // $html = Parser::parse($this->posts->content)->toHtml();

        return view('livewire.admin.action-post-state');
    }
}
