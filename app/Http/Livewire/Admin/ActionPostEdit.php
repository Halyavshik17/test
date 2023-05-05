<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ActionPostEdit extends Component
{
    public $post;    

    public $title;

    public $content;
    public $category_id;

    public $validatedData;

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required',

        'category_id' => 'required|integer|exists:categories,id'
    ];

    public function route()
    {
        return Route::get('admin/posts/{slug}')
            ->name('admin.post.edit');
    }

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->first();
        $this->title = $this->post->title; 
    }

    public function edit($slug)
    {
        $validatedData = $this->validate();

        if ($this->selected_id) {
            $record = Post::findOrFail($this->selected_id);
            $record->update($validatedData);
        }

        $this->resetModal();
    }

    public function render()
    {
        return view('livewire.admin.action-post-edit')->layout('layouts.admin');
    }
}
