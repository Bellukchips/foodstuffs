<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * function to show form login
     */
    public function index()
    {

        /**
         * check data authenticate for redirect in accrodance with roles
         */
        if (Auth::user() == null) {
            return view('auth.login');
        } else if (Auth::user()->roles == "ADMIN") {
            return redirect()->route('dashboardAdmin');
        } else if (Auth::user()->roles == "USER") {
            return redirect()->route('dashboardUser');
        }
    }

    /**
     * function authenticate
     */
    public function authenticate(Request $request)
    {
        // validate form sign in accomodated in the credentials variabel
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        /**
         * if form is valid
         * then it will be continued for check roles user
         * if roles are detected
         * then it will create new session and it will routing to page appropriate
         */
        if (Auth::attempt($credentials)) {
            if (Auth::user()->roles == "ADMIN") {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            } else if (Auth::user()->roles == "USER") {
                $request->session()->regenerate();
                return redirect()->intended('/foodstuffs');
            } else {
                return abort(404);
            }
        }
        return back()->with('authFailed', 'Sign In Failed');
    }
    /**
     * logout function
     */
    public function logout(Request $request)
    {
        /**
         * logout
         */
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
