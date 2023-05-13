<?php

namespace App\Http\Livewire\Admin;

use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
// Сделать модальные окна отдельным компонентом и передавать все $emit

class ActionPost extends Component
{
    // Прослушиваем событие "editorJs@"
    protected $listeners = [
        'editorjs-save:editor_create' => 'saveEditorState',
        'tagsSelected' => 'saveTagsState'
    ];

    public $posts;

    public $categories;

    public $title;

    public $content;
    public $category_id;

    public $selected_id;

    public $validatedData;

    public $selectedTags;

    protected $rules = [
        'title' => 'required|string',
        'content' => 'required',

        // 'category_id' => 'required|integer|exists:categories,id'
    ];

    protected $messages = [
        // 'title.required' => 'Данная строка необходима для заполнения'
    ];

    public $showingModalCreate = false;

    public function showModalCreate()
    {
        $this->showingModalCreate = true;
    }

    public function saveEditorState($editorJsonData)
    {
        $this->content = json_encode($editorJsonData);
    }

    public function saveTagsState($tags)
    {
        $this->selectedTags = $tags;
    }

    public function save()
    {
        $validatedData = $this->validate();
        if(isset($validatedData)) {
            $post = Post::firstOrCreate($validatedData, ['slug' => Str::slug(time() . ' ' . $this->title)]);

            if(isset($this->selectedTags))
                $post->tags()->attach($this->selectedTags);
        }

        $this->resetModal();
    }

    public function create()
    {
        $validatedData = $this->validate();
        Post::firstOrCreate($validatedData);

        $this->resetModal();
    }

    public function delete(Post $post)
    {
        $post->delete();
        $this->resetModal();
    }

    public function edit(Post $post)
    {
        $this->title = $post->title;
        $this->selected_id = $post->id;

        $this->content = $post->content;
    }

    public function update()
    {
        $validatedData = $this->validate();

        if ($this->selected_id) {
            $record = Post::findOrFail($this->selected_id);
            $record->update($validatedData);
        }

        $this->resetModal();
    }

    public function resetModal()
    {
        $this->resetExcept();
        $this->resetErrorBag();
    }

    public function render()
    {
        $this->posts = Post::all();
        $this->categories = Category::all();

        return view('livewire.admin.action-post');
    }
}
