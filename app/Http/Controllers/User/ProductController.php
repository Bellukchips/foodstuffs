<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\FoodStuffs;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkPartner =  Partner::where('id_user', Auth::user()->id)->get();
        if (count($checkPartner) > 0) {
            $partner = Partner::where('id_user', Auth::user()->id)->firstOrFail();
            $foodstuffs = FoodStuffs::with(['categorie'])->where('id_partner', $partner->id)->paginate(10);
            return view('user.dashboard.product.index', compact('checkPartner', 'foodstuffs'));
        }
        return view('user.dashboard.product.index', compact('checkPartner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categorie::all();
        return view('user.dashboard.product.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'id_categorie' => 'required',
            'desc' => 'required',
            'thumbnail' => 'required|image|max:2048'
        ]);
        try {

            $user = User::where('id', Auth::user()->id)->first();
            /**
             * check completed data account
             */
            if ($user->address == null || $user->phone == null || $user->zip_code == null | $user->province == null || $user->country == null || $user->city == null) {
                return back()->with('failedRequest', 'Please complete your personal data');
            } else {
                /**
                 * check if user is not register as partner
                 * then can't to selling product
                 */
                $checkPartner = Partner::where('id_user', Auth::user()->id)->get();
                if (count($checkPartner) == 0) {
                    return back()->with('failedRequest', 'Open your store first, if you want to selling your product');
                } else {
                    $partner = Partner::where('id_user', Auth::user()->id)->firstOrFail();
                    if ($request->file('thumbnail')) {
                        $file = $request->file('thumbnail')->store('assets/product', 'public');
                        $request->thumbnail = $file;
                    }
                    FoodStuffs::create([
                        'name' => $request->name,
                        'price' => $request->price,
                        'desc' => $request->desc,
                        'id_categorie' => $request->id_categorie,
                        'id_partner' => $partner->id,
                        'thumbnail' => $request->thumbnail
                    ]);
                    return redirect()->route('product.index')->with('success', 'Success save new product');
                }
            }

            //code...
        } catch (\Exception $error) {
            return back()->with('failedRequest', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodstuffs = FoodStuffs::findorFail($id);
        $categorie = Categorie::all();

        return view('user.dashboard.product.edit', [
            'data' => $foodstuffs,
            'categorie' => $categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'id_categorie' => 'required',
            'desc' => 'required',
        ]);
        try {
            if ($request->file('thumbnail')) {
                $file = $request->file('thumbnail')->store('assets/product', 'public');
                $request->thumbnail = $file;
            }
            /**
             * update
             */
            $foodstuffs = FoodStuffs::find($id);
            if ($request->thumbnail == null) {
                $foodstuffs->name = $request->name;
                $foodstuffs->price = $request->price;
                $foodstuffs->desc = $request->desc;
                $foodstuffs->update();
            } else {
                $foodstuffs->name = $request->name;
                $foodstuffs->price = $request->price;
                $foodstuffs->desc = $request->desc;
                $foodstuffs->thumbnail = $request->thumbnail;
                $foodstuffs->update();
            }
            return redirect()->route('product.index')->with('success', 'Success update product');

            //code...
        } catch (\Exception $error) {
            return back()->with('failedRequest', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // save data to table
            $foodstuffs = FoodStuffs::find($id);
            // remove image from storage laravel
            Storage::delete(public_path($foodstuffs->img_banner));
            $foodstuffs->delete();
            return redirect()->route('product.index')->with('success', 'Success delete product');
        } catch (\Exception $error) {
            return back()->with('requestFailed', $error);
        }
    }
    /**
     * add to cart
     */
    public function addToCart($idProduct)
    {
        try {
            $foodstuffs = FoodStuffs::where('id', $idProduct)->firstOrFail();

            Cart::create([
                'id_foodstuffs' => $idProduct,
                'id_user' => Auth::user()->id,
                'quantity' => 1,
                'total' => $foodstuffs->price
            ]);
            return back()->with('success', 'Success add to cart');
        } catch (\Exception $error) {
            return back()->with('failedRequest', $error);
        }
    }
    /**
     * detail product
     */
    public function detail($id)
    {
        $foodstuffs = FoodStuffs::with(['partner'])->findorFail($id);
        return view('user.product.detail.detail', compact('foodstuffs'));
    }
}
