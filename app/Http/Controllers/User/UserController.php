<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'eamil'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->eamil;
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        
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
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This eamil is not exists on users table'
        ]);
        $creds = $request->only('email','password');
        // dd($creds);
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect Credentials');
        }
    }
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
