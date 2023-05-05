<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Maxeckel\LivewireEditorjs\Http\Livewire\EditorJS;

class CustomEditor extends EditorJS
{
    // public $data;
    // public $value = [];

    protected $listeners = ['update_editor'];

    public function update_editor($content)
    {
        if (is_string($content)) {
            $this->value = json_decode($content, true);
        }

        // $this->data = $this->value;
        // dd($this->value);
        // $this->data = $this->value;
        $this->emit('$refresh');
        
        // $this->reset();
        // $this->mount('1', $content);
        // $this->render();
    }

    // public function render(): View
    // {
    //     Log::debug('render');

    //     return view('livewire.custom-editor');
    // }
}
