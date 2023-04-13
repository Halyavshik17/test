<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Durlecode\EJSParser\Parser;

class ActionPostState extends Component
{
    public $posts;
    public function render()
    {
        $posts = Post::all();

        // dd($posts);
        // $html = Parser::parse($data)->toHtml();

        return view('livewire.admin.action-post-state');
    }
}
