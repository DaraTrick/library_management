<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        // $users = User::latest()->get();
        $users = User::where('id', '!=', Auth::guard('web')->user()->id)->latest()->get();
        return view('backend.manage-staff', compact('users'));
    }

    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials) AND Auth::guard('web')->user()->status == 'Active'){
            return redirect()->route('dashboard');
        }
        elseif(Auth::attempt($credentials) AND Auth::guard('web')->user()->status == 'Pending'){
            return redirect()->route('login')->with('error','ធ្វើការផ្ទៀតផ្ទាត់អុីម៉ែលរបស់អ្នក!');
        }
        else{
            return redirect()->route('login')->with('error','អ្នកបញ្ចូលព័ត៌មានមិនត្រឹមត្រូវទេ!');
        }
    }
}
