<?php

namespace App\Modules\Blog\Http\Controllers\Message;

use App\Models\Message;
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

        $data = \App\Models\Message::all();
        return view('blog::Message.index', compact('data'));
    }
    public function create()
    {
        $service = Message::with("type")->get();

        return view('blog::Message.create', compact('service'));
    }

    public function store(Request $request)
    {

        $service = new \App\Models\Message();
        $service->title = $request->title;
        $service->type = $request->type;
        $service->summary = $request->summary;
        $service->details = $request->details;



        try{


            $service->save();
            return redirect()->route("message")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }
    public function edit($id)
    {

        $data =  Message::find($id);

        return view('blog::Message.edit', compact('service','data'));
    }
    public function update(Request $request,$id)
    {

        $service = \App\Models\Message::find($id);
        $service->title = $request->title;
        $service->type = $request->type;
        $service->summary = $request->summary;
        $service->details = $request->details;



        try{

            $service->save();
            return redirect()->route("message")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\Message::find($id)->delete();

        return back()->with("success","deleted");
    }
}
