<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // Already grouped in routes
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    
    // use to show the application dashboard and view after login.
    public function userHome(){
        return view('home', ["msg" => "I'm user role"]);
    }

    public function editorHome(){
        return view('home', ["msg" => "I'm editor role"]);
    }
    
    public function adminHome(){
        return view('home', ["msg" => "I'm admin role"]);
    }

}
