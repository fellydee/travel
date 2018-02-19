<?php

namespace App\Modules\Blog\Http\Controllers\Gallery;

use App\Models\Gallery;
use App\Models\GalleryType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
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

        $data = \App\Models\Gallery::all();
        return view('blog::Gallery.index', compact('data'));
    }
    public function create()
    {
        $service = Gallery::with("type")->get();
        $cat = GalleryType::all();
        return view('blog::Gallery.create', compact('service','cat'));
    }

    public function store(Request $request)
    {

        $service = new \App\Models\Gallery();
        $service->title = $request->title;
        $service->gallery_type_id = $request->gallery_type_id;
        $service->summary = $request->summary;



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
                    $service->image_url = 'uploads/'.$new_file_name;
                }
            }



            $service->save();
            return redirect()->route("gallery")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }
    public function edit($id)
    {
        $service = GalleryType::all();
        $data =  Gallery::find($id);

        return view('blog::Gallery.edit', compact('service','data'));
    }
    public function update(Request $request,$id)
    {

        $service = \App\Models\Gallery::find($id);
        $service->title = $request->title;
        $service->gallery_type_id = $request->gallery_type_id;
        $service->summary = $request->summary;



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
                    $service->image_url = 'uploads/'.$new_file_name;
                }
            }


            $service->save();
            return redirect()->route("gallery")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\Gallery::find($id)->delete();

        return back()->with("success","deleted");
    }
}
