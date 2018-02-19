<?php

namespace App\Modules\Blog\Http\Controllers\About;

use App\Models\AboutUs;
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

        $data = \App\Models\AboutUs::all();
        return view('blog::AboutUs.index', compact('data'));
    }
    public function create()
    {

        return view('blog::AboutUs.create');
    }

    public function store(Request $request)
    {

        $service = new \App\Models\AboutUs();
        $service->title = $request->title;
        $service->summary = $request->summary;
        $service->description = $request->description;



        try{


            $service->save();
            return redirect()->route("aboutus")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }
    public function edit($id)
    {

        $data =  AboutUs::find($id);

        return view('blog::AboutUs.edit', compact('service','data'));
    }
    public function update(Request $request,$id)
    {

        $service = \App\Models\AboutUs::find($id);
        $service->title = $request->title;
        $service->summary = $request->summary;
        $service->description = $request->description;



        try{

            $service->save();
            return redirect()->route("aboutus")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\AboutUs::find($id)->delete();

        return back()->with("success","deleted");
    }
}
