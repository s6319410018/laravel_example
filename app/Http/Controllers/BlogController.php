<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->where('status', true)->get();
        return view('welcome', compact('blogs'));
    }

    public function detail($id)
    {
    //  $blog=DB::table('blogs')->where('id', $id)->first();
     $blog=Blog::find($id);
      return view('detail',compact('blog'));
       
    }

}
