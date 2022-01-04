<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\FoodStuffs;
use App\Models\Partner;
use Carbon\Carbon;
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
        $checkPartner =  Partner::where('id_user', Auth::user()->id)->get();
        if (count($checkPartner) > 0) {
            $partner = Partner::where('id_user', Auth::user()->id)->firstOrFail();
            $product = FoodStuffs::where('id_partner', '!=', $partner->id)->latest()->get();
            return view('user.index', compact('banner', 'categorie', 'product'));
        }
        $product = FoodStuffs::latest()->get();
        return view('user.index', compact('banner', 'categorie', 'product'));
    }

    /**
     * go to dashboard page
     */
    public function goToDashboard()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->count();
        return view('user.dashboard.index', compact('cart'));
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
        $partner = Partner::where('id_user', Auth::user()->id)->first();
        /**
         * get data partenr where id_user == id_user signin
         */
        $checkPartner =  Partner::where('id_user', Auth::user()->id)->get();
        // get data categorie
        $categorie = Categorie::all();
        return view('user.dashboard.store.index', compact('partner', 'checkPartner', 'categorie'));
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
