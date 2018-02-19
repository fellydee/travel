<?php

namespace App\Modules\Blog\Http\Controllers\Order;

use App\Models\Package;
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

        $data = \App\Models\Order::all();
        return view('blog::Order.index', compact('data'));
    }

    public function create()
    {
        $pack = Package::all();
        return view('blog::Order.create', compact('customers','bill_number','pack'));

    }

    public function store(Request $request)
    {
        $service = new \App\Models\Order();
        $service->package_id = $request->package_id;
        $service->name = $request->name;
        $service->email = $request->email;
        $service->phone = $request->phone;
        $service->address = $request->address;
        $service->note = $request->note;
        $service->status = $request->status;

        try{
            $service->save();
            return redirect()->route("order")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }



    }

    public function edit($id)
    {
        $data  = \App\Models\Order::find($id);
        $pack = Package::all();
        return view('blog::Order.edit', compact('data','pack'));
    }

    public function update($id,Request $request)
    {
        $service = \App\Models\Order::find($id);
        $service->package_id = $request->package_id;
        $service->name = $request->name;
        $service->email = $request->email;
        $service->phone = $request->phone;
        $service->address = $request->address;
        $service->note = $request->note;
        $service->status = $request->status;

        try{
            $service->save();
            return redirect()->route("order")->with("success","successfully added");
        }catch (\Exception $exception){
            return back()->with("success","successfully added");
        }
    }

    public function destroy($id)
    {
        $service  = \App\Models\Order::find($id)->delete();

        return back()->with("success","deleted");
    }
}
