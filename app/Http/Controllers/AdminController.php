<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('blog', compact('blogs'));
    }

    public function about()
    {
        $name = "Pattarapong";
        $date = "8 มีนาคม 2566";
        return view('about', compact('name', 'date'));
    }

    public function create()
    {
        return view('form');
    }
    public function insert(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
            ],
            [
                'title.required' => 'กรุณาป้อนชื่อบทความ',
                'title.max' => 'ไม่ควนเกิน 50 ตัวอักษร',
                'content.required' => 'กรุณาป้อนเนื้อหา',
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
      Blog::insert($data);
        return redirect('/author/blog');
    }
    public function delete($id)
    {
        Blog::find($id)->delete();
        return redirect()->back();
    }
    public function chang_status($id)
    {
        $blog = Blog::find($id);
        $data = [
            'status' => !$blog->status
        ];
        Blog::find($id)->update($data);
        return redirect('/author/blog');
    }
    public function edit($id)
    {
    //  $blog=DB::table('blogs')->where('id', $id)->first();
     $blog=Blog::find($id);
      return view('edit',compact('blog'));
       
    }

    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'title' => 'required|max:50',
                'content' => 'required',
            ],
            [
                'title.required' => 'กรุณาป้อนชื่อบทความ',
                'title.max' => 'ไม่ควนเกิน 50 ตัวอักษร',
                'content.required' => 'กรุณาแก้ไขเนื้อหาก่อน',
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        
        Blog::find($id)->update($data);
        return redirect('/author/blog');
    }


}
