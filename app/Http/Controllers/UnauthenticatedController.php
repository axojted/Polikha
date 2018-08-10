<?php

namespace App\Http\Controllers;
use App\User;
use App\Hash;
use DB;
use Illuminate\Http\Request;
use App\UserRole;

class UnauthenticatedController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function loginCreate()
    {
        return view('pages.login');
    }
    public function loginStore()
    {   
        if(auth()->attempt(request(['username','password'])))
        {
            if(UserRole::find(auth()->id())->role_id == 1)
            {
                return redirect('/3/index');
            }
            else if(!DB::table('update_username')->where('user_id',auth()->id()))
            {
                return redirect('set-profile');
            }else{
                return redirect('/');                
            }
        }
        else{
            return redirect('/login')->with('message','Authentication Failed.');
        }
    }
    public function signupCreate()
    {
        return view('pages.signup');
    }
    public function signupStore()
    {
        if(route('signup-create')){
            $role = 2;
        }else{
            $role=1;
        }
        $this->validate(request(),[
            'first'=>'required',
            'last'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        $user = User::create([
            'first'=>request('first'),
            'last'=>request('last'),
            'username'=>substr(request('last').time(),0,15),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ]);
        UserRole::create([
            'user_id'=>$user->id,
            'role_id'=>$role
        ]);

        auth()->login($user);
        if(!DB::table('update_username')->where('user_id',$user->id)){
            return redirect('/set-profile');
        }else{
            return redirect('/');
        }   
    }
    public function adminLogin()
    {
        return view('admin.login');
    }
}
