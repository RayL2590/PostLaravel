<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255|min:8|confirmed'
        ]);
        //store
        User::create([
            'name' => $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);
        //sign the user
        auth()->attempt($request->only('email', 'password'));
        //redirect
        return redirect()->route('dashboard');
    }
}
