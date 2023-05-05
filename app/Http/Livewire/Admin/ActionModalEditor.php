<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ActionModalEditor extends Component
{
    // Прослушиваем событие "editorJs@"
    protected $listeners = ['showEditor'];

    public $showingModalEdit = false; 

    public function showEditor($value)
    {
        // dd($value);
        $this->showingModalEdit = true;
    }


    public function render()
    {
        return view('livewire.admin.action-modal-editor');
    }
}
