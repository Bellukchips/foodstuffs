<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Partner;
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

            return redirect()->route('goToAccount')->with('success', 'Success update account');
        } catch (\Exception $error) {
            return back()->with('dashboardFailed', $error);
        }
    }
    public function saveStoreSettings(Request $request)
    {
        $request->validate([
            'is_store_open' => 'required',
            'name' => 'required',
            'category' => 'required'
        ]);

        try {
            /**
             * get data user for check completing account
             */
            $user = User::where('id', Auth::user()->id)->first();
            $checkPartner = Partner::where('id_user', $user->id)->get();
            if ($user->address == null || $user->phone == null || $user->zip_code == null | $user->province == null || $user->country == null || $user->city == null) {
                return back()->with('failedRequest', 'Please complete your personal data');
            } else if (count($checkPartner) == 0) {
                /**
                 * save data
                 */
                Partner::create([
                    'id_user' => Auth::user()->id,
                    'name' => $request->name,
                    'categories_partner' => $request->category,
                    'is_open' => $request->is_store_open,
                    'address' => Auth::user()->address
                ]);
                return redirect()->route('goToStoreSettings')->with('success', 'Success update settings store');
            } else {
                /**
                 * update partner
                 */
                $partner = Partner::where('id_user',Auth::user()->id)->firstOrFail();
                $partner->name = $request->name;
                $partner->categories_partner = $request->category;
                $partner->is_open = $request->is_store_open;
                $partner->update();
                return redirect()->route('goToStoreSettings')->with('success', 'Success update settings store');
            }
        } catch (\Exception $error) {
            return back()->with('failedRequest', $error);
        }
    }
}
