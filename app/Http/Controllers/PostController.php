<?php

namespace App\Http\Controllers;

use App\Http\EditorParser;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Durlecode\EJSParser\Parser;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();

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
