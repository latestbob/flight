<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminhome()
    {
        return view('admin.home');
    }

    //admin customers 

    public function customer(){
        $user = User::where('isadmin',NULL)->get();
        return view('admin.customer',compact('user'));
    }

    //deactivate User

    public function deactivate($id){
        $user = User::find($id)->delete();



        return back()->with('msg','User Deactivated successfully');
        
    }

    public function customerdelete($id){
        $user= User::find($id)->delete();
        return back()->with('msg','User Deleted Successfully');
    }
}
