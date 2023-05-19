<?php

namespace App\Http\Controllers;

use App\Http\EditorParser;
use App\Models\Category;
use App\Models\Post;
// use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Illuminate\Http\Request;
// use Durlecode\EJSParser\Parser;

// use Butschster\Head\MetaTags\MetaInterface;

class PostController extends Controller
{
    protected $meta;

    public function __construct(MetaInterface $meta)
    {
        $this->meta = $meta;
    }

    public function index()
    {
        $categories = Category::all();

        $this->meta
        
        // Will render "Home page - Default Title"
       ->prependTitle('Flashaqua');

        // dd($this->meta);

        // $meta_title = 'Flashaqua';
        // $meta = collect('meta_title')->merge($meta_title);
        // dd($meta->meta_title);
        

        return view('index', compact('categories'));
    }

    public function show($slug)
    {
        try {
            $post = Post::where('slug', $slug)->first();
            $html = EditorParser::parse($post->content)->toHtml();

            return view('show-post', compact('post', 'html'));
        }
        catch(\Exception $exception) {
            return abort(404);
        }
    }
}
