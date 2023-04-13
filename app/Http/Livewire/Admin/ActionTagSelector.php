<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class ActionTagSelector extends Component
{
    public $tags = [];
    public $selectedTags = [];

    protected $rules = [
        'selectedTags' => 'nullable|array'
    ];

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function updatedSelectedTags($value)
    {
        $this->emitUp('tagsSelected', $value);
    }

    public function render()
    {
        return view('livewire.admin.action-tag-selector');
    }
}