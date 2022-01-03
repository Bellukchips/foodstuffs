<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUser extends Controller
{
    /**
     * update data user
     */
    public function updateAccount(Request $request)
    {
        /**
         * validation form request for update data account
         */
        $request->validate([
            'name' => 'required',
            'province' => 'required|max:50',
            'city' => 'required|max:50',
            'zip_code' => 'required|integer',
            'country' => 'required',
            'phone' => 'required|max:20',
            'gender' => 'required',
            'address' => 'required'
        ]);

        try {
            /**
             * update data user account based on id
             */
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            $user->province = $request->province;
            $user->city = $request->city;
            $user->zip_code = $request->zip_code;
            $user->country = $request->country;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->update();

            return redirect()->route('goToAccount')->with('success','Success update account');
        } catch (\Exception $error) {
            return back()->with('dashboardFailed',$error);
        }
    }
}
