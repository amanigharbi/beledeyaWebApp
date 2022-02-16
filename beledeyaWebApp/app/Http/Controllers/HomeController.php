<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }
    public function index()
    {
        return view('home');
    }
    public function documents()
    {
        return view('documents');
    }
    public function reclamation()
    {
        return view('reclamation');
    }
    public function about()
    {
        return view('about');
    }
}
