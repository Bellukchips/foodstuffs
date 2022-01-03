<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * index user
     */
    public function index()
    {
        $banner = Banner::all();
        return view('user.index',compact('banner'));
    }

    /**
     * go to dashboard page
     */
    public function goToDashboard()
    {
        return view('user.dashboard.index');
    }
    /**
     * go to dashboard product page
     */
    public function goToProductDashboard()
    {
        return view('user.dashboard.product.index');
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
        return view('user.dashboard.store.index');
    }
    /**
     * go to account page
     */
    public function goToAccount()
    {
        return view('user.dashboard.account.index');
    }
    /**
     * create new product
     */
    public function createNewProduct()
    {
        return view('user.dashboard.product.create');
    }
    /**
     * show detail product in dashboard
     */
    public function showDetailProductDashboard()
    {
        return view('user.dashboard.product.edit');
    }
    /**
     * show detail transaction
     */
    public function showDetailTransaction()
    {
        return view('user.dashboard.transaction.show');
    }
}
