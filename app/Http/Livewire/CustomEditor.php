<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Maxeckel\LivewireEditorjs\Http\Livewire\EditorJS;

class CustomEditor extends EditorJS
{
    // public $data;
    public $value = [];

    protected $listeners = ['update_editor'];

    public function update_editor($content)
    {
        if (is_string($content)) {
            $this->value = json_decode($content, true);
        }

        // $this->data = $this->value;
        // dd($this->value);
        // $this->data = $this->value;
        // $this->emit('$refresh');
        // Log::debug($this->data);
        // $this->reset();
        $this->mount('editor_edit', $content);
        $this->render();
    }
}
