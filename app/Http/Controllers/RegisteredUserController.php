<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Registration Page
     */
    public function create()
    {
        //
        return view('auth.register');
    }

   
    public function store(Request $request)
    {

        $userFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $employerFields = $request->validate([
            'employer' => 'required',
            'logo' => 'required|file:image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'name' => $userFields['name'],
            'email' => $userFields['email'],
            'password' => bcrypt($userFields['password'])
        ]);

        $logoPath = $request->logo->store('logos', 'public');

        $user->employer()->create([
            'name' => $employerFields['employer'],
            'logo' => $logoPath,
        ]);

        Auth::login($user);

        return redirect()->route('jobs.index');
    }
}
