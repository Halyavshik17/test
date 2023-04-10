<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
// Сделать модальные окна отдельным компонентом и передавать все $emit

class ActionPost extends Component
{
    // Прослушиваем событие "editorJs@"
    protected $listeners = ['editorjs-save:myEditor' => 'saveEditorState'];

    public $data;

    public $posts;
    public $title;

    public $selected_id;

    public $validatedData;

    protected $rules = [
        'title' => 'required|string'
    ];

    protected $messages = [
        'title.required' => 'Данная строка необходима для заполнения'
    ];

    public $showingModalCreate = false;
    public $showingModalEdit = false;

    public function showModalCreate()
    {
        // $this->showingModalCreate = true;

        return view('livewire.admin.action-post-create');
    }

    public function saveEditorState($editorJsonData)
    {
        // $this->model->data = $editorJsonData;
        $this->data = $editorJsonData;
        // dd($this->data);
    }

    public function save()
    {
        // $this->data = $editorJsonData;
        $outData = json_encode($this->data);

        // $outData = $this->data;
        dd($outData);
        if(isset($outData))
        {
            Post::firstOrCreate([
                'title' => 'test',
                'content' => $outData
            ]);
        }


        // $validatedData = $this->validate();
        // Post::firstOrCreate([
        //     'title' => 'test',
        //     'content' => $this->data
        // ]);

        // session()->flash('message', 'Уиии мы добавили категорию!');
    }

    public function create()
    {
        $validatedData = $this->validate();
        Post::firstOrCreate($validatedData);

        session()->flash('message', 'Уиии мы добавили категорию!');

        $this->resetModal();
    }

    public function delete(Post $post)
    {
        $post->delete();
        $this->resetModal();
    }

    public function edit(Post $post)
    {
        $this->showingModalEdit = true;

        $this->title = $post->title;
        $this->selected_id = $post->id;
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
        // dd($this->posts);
        return view('livewire.admin.action-post');
    }
}
