<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'hospital'=>'required',
            'email'=>'required|email|unique:doctors,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->hospital = $request->hospital;
        $doctor->email = $request->email;
        $doctor->password = \Hash::make($request->password);
        $save = $doctor->save();
        if($save){
            return redirect()->back()->with('success','Your are now registered successfully');
        }else{
            return redirect()->back()->with('fail','Something went worng,failed to register');
        }
    }
    // user login check
    function check(Request $request){
        //validate inputs
        $request->validate([
            'email'=>'required|email|exists:doctors,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This eamil is not exists on users table'
        ]);
        $creds = $request->only('email','password');
        // dd($creds);
        if(Auth::guard('doctor')->attempt($creds)){
            return redirect()->route('doctor.home');
        }else{
            return redirect()->route('doctor.login')->with('fail','Incorrect Credentials');
        }
    }
    function logout(){
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
