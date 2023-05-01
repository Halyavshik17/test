<?php

namespace App\Http\Controllers;

use App\Http\EditorParser;
use App\Models\Post;
use Illuminate\Http\Request;
use Durlecode\EJSParser\Parser;

class PostController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show(Post $post)
    {
        $html = EditorParser::parse($post->content)->toHtml();

        return view('show-post', compact('post', 'html'));
    }
}
