<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use App\User;

class LoginController extends Controller
{
     public function index()
    {
          if (Auth::check())
          {
                return redirect('dashboard');
          }

          return view('admin/login');
    }
    
    public function Login(Request $request)
    {
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
              return redirect('admin');

        } 
        else{ 
               Session::flash('error','Email/Password does not match!');
              return redirect()->back();
        } 
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('admin');
      }


      public function change_password()
      {
        Session::put('page','password');
        return view('admin.change-password');
      }
    
    
      public function update_password(Request $request)
      {
        $validator =  $request->validate([
        'current' => 'required|string|min:8',
        'password' => 'required|string|min:8',
        'confirm' => 'required|string|min:8|same:password',
        'email'=>'required|email',
        ]);

        $hashedPassword = Auth::user()->password;
        if (\Hash::check($request['current'] , $hashedPassword ))
        {
           $password=Hash::make($request['password']);
            $user=User::find(Auth::user()->id);
           
            $user->password=$password;
            $user->email=$request['email'];
            if ($user->update()) 
            {
               Session::flash('success',"Admin password has been updated");
              return redirect()->back();
           }
            else
            {
              Session::flash('error',"Something went wrong!");
              return redirect()->back();
            }
      }
      else
      {
        Session::flash('error',"Current password was incorrect");
          return redirect()->back();
      }       

    }
}
