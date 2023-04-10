<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

// Сделать модальные окна отдельным компонентом и передавать все $emit

class ActionTags extends Component
{
    public $tags;
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

    public function showModalCreate() {
        $this->showingModalCreate = true;
    }

    public function create()
    {
        $validatedData = $this->validate();
        Tag::firstOrCreate($validatedData);

        session()->flash('message', 'Уиии мы добавили тег!');

        $this->resetModal();
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        $this->resetModal();
    }

    public function edit(Tag $tag)
    {
        $this->showingModalEdit = true;

        $this->title = $tag->title;
        $this->selected_id = $tag->id;
    }

    public function update()
    {   
        $validatedData = $this->validate();

        if($this->selected_id) {
            $record = Tag::findOrFail($this->selected_id);
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
        $this->tags = Tag::all();

        return view('livewire.admin.action-tags');
    }
}
