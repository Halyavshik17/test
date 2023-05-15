<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ActionTagSelector extends Component
{
    public $post;

    public $tags = [];
    public $selectedTags = [];

    public $state = false;

    protected $rules = [
        'selectedTags' => 'nullable|array'
    ];

    public function mount($slug)
    {
        if($slug != NULL) {
            $this->post = Post::where('slug', $slug)->first();

            $this->state = true;
        }

        $this->tags = Tag::all();
        // Log::debug($this->selectedTags);
        // dd($this->post->tags->pluck('id')->toArray());
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
