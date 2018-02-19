<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use App\Modules\Blog\Http\Requests\CreatePackageRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
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

        $data = \App\Models\Package::all();
        return view('blog::Package.index', compact('data'));
    }
    public function create()
    {
      $service = Service::all();
      return view('blog::Package.create', compact('service'));
    }

    public function store(CreatePackageRequest $request)
    {

        $service = new \App\Models\Package();
        $service->title = $request->title;
        $service->service_id = $request->service_id;
        $service->summary = $request->summary;
        $service->description = $request->description;
        $service->old_price = $request->old_price;
        $service->new_price = $request->new_price;
        $service->discount = $request->discount;

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
            if($request->hasFile("packages_image_1"))
            {
                $file = $request->file('packages_image_1');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_1 = 'uploads/'.$new_file_name;
                }
            }
            if($request->hasFile("packages_image_2"))
            {
                $file = $request->file('packages_image_2');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_2 = 'uploads/'.$new_file_name;
                }
            }
            if($request->hasFile("packages_image_3"))
            {
                $file = $request->file('packages_image_3');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_3 = 'uploads/'.$new_file_name;
                }
            }
            if($request->hasFile("packages_image_4"))
            {
                $file = $request->file('packages_image_4');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_4 = 'uploads/'.$new_file_name;
                }
            }
            $service->save();
            return redirect()->route("package")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }
    public function edit($id)
    {
        $service = Service::all();
        $data =  Package::find($id);

        return view('blog::Package.edit', compact('service','data'));
    }
    public function update(CreatePackageRequest $request,$id)
    {

        $service = \App\Models\Package::find($id);
        $service->title = $request->title;
        $service->service_id = $request->service_id;
        $service->summary = $request->summary;
        $service->description = $request->description;
        $service->old_price = $request->old_price;
        $service->new_price = $request->new_price;
        $service->discount = $request->discount;

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
            if($request->hasFile("packages_image_1"))
            {
                $file = $request->file('packages_image_1');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_1 = 'uploads/'.$new_file_name;
                }
            }
            if($request->hasFile("packages_image_2"))
            {
                $file = $request->file('packages_image_2');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_2 = 'uploads/'.$new_file_name;
                }
            }
            if($request->hasFile("packages_image_3"))
            {
                $file = $request->file('packages_image_3');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_3 = 'uploads/'.$new_file_name;
                }
            }
            if($request->hasFile("packages_image_4"))
            {
                $file = $request->file('packages_image_4');
                $file_name = $file->getClientOriginalName();
                $without_extention = substr($file_name, 0, strrpos($file_name, "."));
                $file_extention = $file->getClientOriginalExtension();
                $num = rand(1,500);
                $new_file_name = $without_extention.$num.'.'.$file_extention;
                $success = $file->move('uploads/',$new_file_name);
                if($success)
                {
                    $service->packages_image_4 = 'uploads/'.$new_file_name;
                }
            }
            $service->save();
            return redirect()->route("package")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\Package::find($id)->delete();

        return back()->with("success","deleted");
    }
}
