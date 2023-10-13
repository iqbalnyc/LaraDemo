<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class RegisterController extends Controller
{
    public function login() {
        print_r(request()->all());
    }
    
    public function registration() {
        return view('dashboard.registration');
    }

    public function store() 
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255|unique:users,name',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'user_type' => 'required'
        ]);
        
        if (isset($attributes['password_confirmation'])) {
            unset($attributes['password_confirmation']);
        }
        // $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);

        // session()->flash('success', 'User has been created successfully');
        return redirect('/')->with('success', 'User has been created successfully');

        // return back()->with('success', 'User has been created successfully');
    }
}
