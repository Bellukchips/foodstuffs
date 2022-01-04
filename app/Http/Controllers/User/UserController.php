<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categorie;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * index user
     */
    public function index()
    {
        $banner = Banner::all();
        $categorie = Categorie::all();
        return view('user.index',compact('banner','categorie'));
    }

    /**
     * go to dashboard page
     */
    public function goToDashboard()
    {
        return view('user.dashboard.index');
    }
    /**
     * go to transaction dashboard
     */
    public function goToTransactionDashboard()
    {
        return view('user.dashboard.transaction.index');
    }
    /**
     * go to settings store dashboard
     */
    public function goToStoreSettings()
    {
        /**
         * get single data partner where id_user == id user sign in
         */
        $partner = Partner::where('id_user',Auth::user()->id)->first();
        /**
         * get data partenr where id_user == id_user signin
         */
        $checkPartner =  Partner::where('id_user',Auth::user()->id)->get();
        // get data categorie
        $categorie = Categorie::all();
        return view('user.dashboard.store.index',compact('partner','checkPartner','categorie'));
    }
    /**
     * go to account page
     */
    public function goToAccount()
    {
        return view('user.dashboard.account.index');
    }
    /**
     * show detail transaction
     */
    public function showDetailTransaction()
    {
        return view('user.dashboard.transaction.show');
    }
}
