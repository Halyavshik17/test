<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Maxeckel\LivewireEditorjs\Http\Livewire\EditorJS;

class CustomEditor extends EditorJS
{
    // public $data;
    public $value = [];

    protected $listeners = ['update_editor'];

    public $editorId;

    public $data;

    public $class;

    public $style;

    public $readOnly;

    public $placeholder;

    public $uploadDisk;

    public $downloadDisk;

    public $imagesPath;

    public $logLevel;

    public function mount(
        $editorId,
        $value = [],
        $class = '',
        $style = '',
        $readOnly = false,
        $placeholder = null,
        $uploadDisk = null,
        $downloadDisk = null
    ) {
        if (is_null($uploadDisk)) {
            $uploadDisk = config('livewire-editorjs.default_img_upload_disk');
        }

        if (is_null($downloadDisk)) {
            $downloadDisk = config('livewire-editorjs.default_img_download_disk');
        }

        if (is_null($placeholder)) {
            $placeholder = config('livewire-editorjs.default_placeholder');
        }

        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        $this->editorId = $editorId;
        $this->data = $value;
        $this->class = $class;
        $this->style = $style;
        $this->readOnly = $readOnly;
        $this->placeholder = $placeholder;
        $this->uploadDisk = $uploadDisk;
        $this->downloadDisk = $downloadDisk;

        $this->logLevel = config('livewire-editorjs.editorjs_log_level');
}

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

    public function render(): View
    {
        Log::debug('render');

        return view('livewire.custom-editor');
    }
}
