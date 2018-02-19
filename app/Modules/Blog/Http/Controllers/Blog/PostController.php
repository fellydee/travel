<?php

namespace App\Modules\Blog\Http\Controllers\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        if (!Auth::check()) {
            return redirect("/login");
        }
    }
    public function index()
    {

        $data = \App\Models\Blog::all();
        return view('blog::Blog.index', compact('data'));
    }
    public function create()
    {
        $service = Blog::with("category")->get();
        $cat = BlogCategory::all();
        return view('blog::Blog.create', compact('service','cat'));
    }

    public function store(Request $request)
    {

        $service = new \App\Models\Blog();
        $service->title = $request->title;
        $service->category_id = $request->category_id;
        $service->summary = $request->summary;
        $service->description = $request->description;


        try{
            if($request->hasFile("thumbnail"))
            {
                $file = $request->file('thumbnail');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->thumbnail = 'uploads/'.$new_file_name;
                }
            }



            $service->save();
            return redirect()->route("blog")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }
    public function edit($id)
    {
        $service = BlogCategory::all();
        $data =  Blog::find($id);

        return view('blog::Blog.edit', compact('service','data'));
    }
    public function update(Request $request,$id)
    {

        $service = \App\Models\Blog::find($id);
        $service->title = $request->title;
        $service->category_id = $request->category_id;
        $service->summary = $request->summary;
        $service->description = $request->description;


        try{
            if($request->hasFile("thumbnail"))
            {
                $file = $request->file('thumbnail');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->thumbnail = 'uploads/'.$new_file_name;
                }
            }


            $service->save();
            return redirect()->route("blog")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\Blog::find($id)->delete();

        return back()->with("success","deleted");
    }
}
