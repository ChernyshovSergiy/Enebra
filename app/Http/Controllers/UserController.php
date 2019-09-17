<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('Information.modules.signup');
    }


    public function store()
    {
        request()->validate([
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|max:20|same:password',
        ], [
            'first_name.required' => 'The first name is required',
            'last_name.required' => 'The last name is required',
            'first_name.min' => 'Name must be at least 2 characters.',
            'first_name.max' => 'Name should not be greater than 50 characters.',
            'last_name.min' => 'Surname must be at least 2 characters.',
            'last_name.max' => 'Surname should not be greater than 50 characters.',
        ]);


        $input = request()->except('password','confirm_password');
        $user=new User($input);
        $user->password=bcrypt(request()->password);
        $user->save();

        return back()->with('success', 'User created successfully.');
    }
}
