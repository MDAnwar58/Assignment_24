<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function loginPage()
    {
        return view('pages.auth.login');
    }
    function loginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser) {
            $checkPassword = Hash::check($request->password, $checkUser->password);
            if ($checkPassword) {
                if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('login.page')->with('error', 'Your Login Request fail please try again?');
            } else {
                return redirect()->route('login.page')->with('errorPassword', 'Please enter your valid Password');
            }
        } else {
            return redirect()->route('login.page')->with('errorEmail', 'Please enter your valid email');
        }
    }
    function registerPage()
    {
        return view('pages.auth.register');
    }
    function registerRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password|min:5'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.page')->with('success', 'Registration successful');
    }

    function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login.page');
    }
}
