<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Durlecode\EJSParser\Parser;

class PostController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
