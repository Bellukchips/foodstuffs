<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * function to show form register
     */
    public function index()
    {
        /**
         * check data authenticate for redirect in accrodance with roles
         */
        if (Auth::user() == null) {
            return view('auth.register');
        } else if (Auth::user()->roles == "ADMIN") {
            return redirect()->route('dashboardAdmin');
        }else if(Auth::user()->roles == "USER"){
            return redirect()->route('dashboardUser');
        }
    }

    public function store(Request $request)
    {
        /**
         * validation form request
         * and for email if data email is already in database
         * then it will return error be in the form of  email duplicate
         */
        $request->validate([
            'fullName' => 'required|max:100',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required',
            'gender' => 'required',
        ]);
        try {
            /**
             * save data from form request
             */
            User::create([
                'name' => $request->input('fullName'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'gender' => $request->input('gender'),

            ]);
            return redirect()->route('register')->with(['success' => 'Sign up success, Please sign in now']);
        } catch (\Exception $error) {
            return back()->with('authFailed', $error);
        }
    }
}
