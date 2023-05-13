<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Routing\Route;
use Livewire\Component;

class SearchCategoryPost extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = Category::all();

        return view('livewire.search-category-post');
    }
}
