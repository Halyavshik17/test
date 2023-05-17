<?php

namespace App\Http\Livewire;

use App\Http\EditorParser;
use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Illuminate\Routing\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

use simplehtmldom\HtmlDocument;

class PostList extends Component
{
    const ITEMS_PER_PAGE = 2;

    public $postIdChunks = [];
    public $page = 1;
    public $maxPage = 1;
    public $queryCount = 0;

    public function mount()
    {
        $this->prepareChunks();
    }

    public function render()
    {
        return view('livewire.post-list');
    }

    public function loadMore()
    {
        if ($this->hasNextPage()) {
            $this->page++;
        }
    }

    public function prepareChunks()
    {
        $this->postIdChunks = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->whereNull('deleted_at')
            ->pluck('id')
            ->chunk(self::ITEMS_PER_PAGE)
            ->toArray();

        $this->page = 1;

        $this->maxPage = count($this->postIdChunks);

        $this->queryCount++;
    }

    public function hasNextPage()
    {
        return $this->page < $this->maxPage;
    }
}