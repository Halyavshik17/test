<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

// Сделать модальные окна отдельным компонентом и передавать все $emit

class ActionCategory extends Component
{
    public $categories;
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
        Category::firstOrCreate($validatedData);

        session()->flash('message', 'Уиии мы добавили категорию!');

        $this->resetModal();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->resetModal();
    }

    public function edit(Category $category)
    {
        $this->showingModalEdit = true;

        $this->title = $category->title;
        $this->selected_id = $category->id;
    }

    public function update()
    {   
        $validatedData = $this->validate();

        if($this->selected_id) {
            $record = Category::findOrFail($this->selected_id);
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
        $this->categories = Category::all();

        return view('livewire.admin.action-category');
    }
}
