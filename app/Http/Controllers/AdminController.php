<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Airline;

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

    //all airlines

    public function airlines(){
        $airline = Airline::all();
        return view('admin.airline',compact('airline'));
    }

    ///add airline 

    public function addairlines(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'file'=>'required|mimes:jpeg,jpg,png,gif'
        ]);

        $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        //dd($response);

        $airline = new Airline;
        $airline->name = $request->name;
        $airline->image = $response;
        $airline->save();

        return back()->with('msg','Airline Added Successfully');
    }

    //Admin Delete Airline

    public function deleteairline($id){
        $airline = Airline::find($id)->delete();

        return back()->with('msg','Airline Deleted Successfully');
    }

    //get specific airline 

    public function getairline($id){
        $airline = Airline::find($id);

        return response()->json($airline);
    }

    //update airline

    public function updateairline(Request $request){

        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'file'=>'required|mimes:jpeg,jpg,png,gif'
        ]);

        $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        $airline = Airline::where('id',$request->id)->update([
            'name'=>$request->name,
            'image'=>$response
        ]);

        return back()->with('msg','Airline Updated Successfully');
    }
}
