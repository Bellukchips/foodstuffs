<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Categorie;
use App\Models\FoodStuffs;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * index dashboard
     */
    public function index(){
        /**
         * count data from tables
         */
        $foodstuffs = FoodStuffs::count();
        $banners = Banner::count();
        $categories = Categorie::count();
        $user = User::where('roles','USER')->count();
        return view('admin.index',compact('foodstuffs','banners','categories','user'));
    }
    
}
