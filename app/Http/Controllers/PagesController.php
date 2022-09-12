<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Index page
    public function index(){
        return view('index');
    }

    //about page

    public function about(){
        return view('about');
    }
    
    //flight page

    public function flights(){
        return view('flights');
    }

    //contact

    public function contact(){
        return view('contact');
    }

    //track

    public function track(){
        return view('track');
    }

    
}
