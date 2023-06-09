<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;

class ActionPostEdit extends Component
{
    public $post, $title, $content, $slug, $custom_slug, $meta_title, $meta_description, $meta_keywords;
    public $categories;
    public $category_id;

    public $validatedData;

    public $selectedTags = [];

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required',

        'category_id' => 'required|exists:categories,id',
        'slug' => 'string|unique:posts'
        // 'selectedTags' => 'nullable|array'
    ];

    protected $messages = [
        'title.required' => 'ERROR',
        'title.string' => 'ERROR',

        'content.required' => 'ERROR',
        'category_id' => 'ERROR'
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
            $this->slug = $this->post->slug;
            $this->custom_slug = $this->post->slug;
            $this->category_id = $this->post->category_id;

            $post_tags = $this->post->tags->pluck('id')->toArray();
            if(is_array($post_tags))
                $this->selectedTags = $post_tags;

            $this->categories = Category::all();
        }
        catch(\Exception $exception) {
            return abort(404);
        }
        Log::debug($this->selectedTags);

        // dd(Post::where('category_id', 12)->get());
    }

    public function updatingTitle($str)
    {
        $this->custom_slug = Str::slug($this->post->id . ' ' . $str);
    }

    public function update($id)
    {
        $this->slug = Str::slug($this->post->id . ' ' . $this->title);

        $expected  = crypt($this->slug, '$2a$07$usesomesillystringforsalt$');
        $correct   = crypt($this->custom_slug, '$2a$07$usesomesillystringforsalt$');

        $isEquals = hash_equals($expected, $correct);
        if(!$isEquals) {
            $this->slug = $this->custom_slug;
        }

        $validatedData = $this->validate();
        $post = Post::find($id);

        $post->update($validatedData);

        if(isset($this->selectedTags))
            $post->tags()->sync($this->selectedTags);

        return redirect()->route('admin.post.edit', $post->slug);
    }

    public function render()
    {
        return view('livewire.admin.action-post-edit')->layout('layouts.admin');
    }
}
