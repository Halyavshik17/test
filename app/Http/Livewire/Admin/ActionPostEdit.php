<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;

class ActionPostEdit extends Component
{
    public $post;

    public $title;

    public $content;
    public $categories;
    public $category_id;

    public $validatedData;

    public $selectedTags = [];

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required',

        // 'category_id' => 'required|integer|exists:categories,id',
        // 'selectedTags' => 'nullable|array'
    ];

    protected $listeners = [
        'editorjs-save:editor_edit' => 'saveEditorState',
        'tagsSelected' => 'saveTagsState'
    ];

    public function saveEditorState($editorJsonData)
    {
        $this->content = json_encode($editorJsonData);
    }

    public function saveTagsState($tags)
    {
        $this->selectedTags = $tags;
    }

    public function route()
    {
        return Route::get('admin/posts/{slug}')
            ->name('admin.post.edit');
    }

    public function mount($slug)
    {
        try {
            $this->post = Post::where('slug', $slug)->first();
            $this->title = $this->post->title;
            $this->categories = Category::all();
        }
        catch(\Exception $exception) {
            return abort(404);
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $post = Post::find($id);

        $post->update($validatedData);
        $post->update(['slug' => Str::slug(time() . ' ' . $this->title)]);

        if(isset($this->selectedTags))
            $post->tags()->sync($this->selectedTags);

        return redirect()->route('admin.post.edit', $post->slug);
    }

    public function render()
    {
        return view('livewire.admin.action-post-edit')->layout('layouts.admin');
    }
}
