<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('welcome');
        }

        return redirect('/login');

    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
    public function home()
    {

        return view('home');
    }
}
