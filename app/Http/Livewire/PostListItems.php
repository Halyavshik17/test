<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostListItems extends Component
{
    public $postIds;

    public function render()
    {
        $posts = Post::find($this->postIds)->keyBy('id');

        dd(collect($this->postIds)->map(fn ($id) => $posts[$id]));

        $orderedPosts = collect($this->postIds)->map(fn ($id) => $posts[$id]);

        dd($orderedPosts);

        return view('livewire.post-list-items', [
            'posts' => $orderedPosts,
        ]);
    }
}