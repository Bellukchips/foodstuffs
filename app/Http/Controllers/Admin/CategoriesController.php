<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::paginate(5);
        return view('admin.manage_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'title' => 'required|max:100',
            'image_categories' =>  'required|image|max:2048'
        ]);
        try {
            // save data to table
            if ($request->file('image_categories')) {
                $file = $request->file('image_categories')->store('assets/categorie', 'public');
                $data['image_categories'] = $file;
            }
            Categorie::create($data);
            return redirect()->route('categories.index');
        } catch (\Exception $error) {
            return back()->with('requestFailed', $error);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categorie::findorFail($id);
        return view('admin.manage_categories.edit', ['data' => $categories]);
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
            'title' => 'required|max:100',
            'image_categories' =>  'image|max:2048'
        ]);
        try {
            // save data to table
            if ($request->file('image_categories')) {
                $file = $request->file('image_categories')->store('assets/categorie', 'public');
                $request->image_categories = $file;
            }
            /**
             * if form request image categories == null
             *  then just save title
             */
            $categories = Categorie::find($id);
            if ($request->image_categories == null) {
                $categories->title = $request->title;
                $categories->update();
            } else {
                $categories->title = $request->title;
                $categories->image_categories = $request->image_categories;
                $categories->update();
            }
            return redirect()->route('categories.index');
        } catch (\Exception $error) {
            return back()->with('requestFailed', $error);
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

            $categories = Categorie::find($id);
            // remove image from storage laravel
            Storage::delete(public_path($categories->image_categories));
            $categories->delete();
            return redirect()->route('categories.index');
        } catch (\Exception $error) {
            return back()->with('requestFailed', $error);
        }
    }
}
