<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(5);
        return view('admin.manage_banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_banner.create');
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
            'img_banner' =>  'required|image|max:2048'
        ]);
        try {
            // save data to table
            if ($request->file('img_banner')) {
                $file = $request->file('img_banner')->store('assets/banner', 'public');
                $data['img_banner'] = $file;
            }
            Banner::create($data);
            return redirect()->route('banners.index');
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
        $banners = Banner::findorFail($id);
        return view('admin.manage_banner.edit', ['data' => $banners]);
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
            'img_banner' =>  'image|max:2048'
        ]);
        try {
            // save data to table
            if ($request->file('img_banner')) {
                $file = $request->file('img_banner')->store('assets/banner', 'public');
                $request->img_banner = $file;
            }
            /**
             * if form request image categories == null
             *  then just save title
             */
            $banners = Banner::find($id);
            if ($request->img_banner == null) {
                $banners->title = $request->title;
                $banners->update();
            } else {
                $banners->title = $request->title;
                $banners->img_banner = $request->img_banner;
                $banners->update();
            }
            return redirect()->route('banners.index');
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
            $banners = Banner::find($id);
            // remove image from storage laravel
            Storage::delete(public_path($banners->img_banner));
            $banners->delete();
            return redirect()->route('banners.index');
        } catch (\Exception $error) {
            return back()->with('requestFailed', $error);
        }
    }
}
