<?php

namespace App\Modules\Blog\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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

        $data = \App\Models\BlogCategory::all();
        return view('blog::Category.index', compact('data'));
    }

    public function create()
    {
        return view('blog::Category.create', compact('customers','bill_number','progress'));

    }

    public function store(Request $request)
    {
        $service = new \App\Models\BlogCategory();
        $service->title = $request->title;
        $service->summary = $request->summary;
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
        try{
            $service->save();
            return redirect()->route("blog_category")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }



    }

    public function edit($id)
    {
        $cat  = \App\Models\BlogCategory::find($id);

        return view('blog::Category.edit', compact('cat'));
    }

    public function update($id,Request $request)
    {
        $service =  \App\Models\BlogCategory::find($id);
        $service->title = $request->title;
        $service->summary = $request->summary;
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
        try{
            $service->save();
            return redirect()->route("blog_category")->with("success","successfully updated");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\BlogCategory::find($id)->delete();

        return back()->with("success","deleted");
    }
}
