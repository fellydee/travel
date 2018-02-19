<?php

namespace App\Modules\Blog\Http\Controllers;

use App\Modules\Blog\Http\Requests\CreateServiceRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\EventDispatcher\Tests\Service;

class ServiceController extends Controller
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

        $data = \App\Models\Service::all();
        return view('blog::Service.index', compact('data'));
    }

    public function create()
    {
        return view('blog::Service.create', compact('customers','bill_number','progress'));

    }

    public function store(CreateServiceRequest $request)
    {
      $service = new \App\Models\Service();
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
          return redirect()->route("service")->with("success","successfully added");
      }catch (\Exception $exception){
         return back()->with("success","successfully added");
      }



    }

    public function edit($id)
    {
      $service  = \App\Models\Service::find($id);

        return view('blog::Service.edit', compact('service'));
    }

    public function update($id,Request $request)
    {
        $service = new \App\Models\Service();
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
            return redirect()->route("service")->with("success","successfully updated");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
      $service  = \App\Models\Service::find($id)->delete();

      return back()->with("success","deleted");
    }
}
