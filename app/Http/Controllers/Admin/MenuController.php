<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoredRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=Menu::all();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.menus.create',compact('categories'));   
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoredRequest $request)
    {
        $image=$request->file('image')->store('public/menus');
        $menu=Menu::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$image
        ]);
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }
        return to_route('admin.menu.index')->with('success','menu added successfully');
    }

    
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories=Category::all();
        return view('admin.menus.edit',compact(['categories','menu']));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=>['required'],
           'description'=>['required'],
           'price'=>['required','max:1000','min:0'],
        ]);
        $image=$menu->image;
        if($request->hasFile('image')){
      Storage::delete($menu->image);
      $image=$request->file('image')->store('public/menus');
        }
       $menu->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'image'=> $image,

        ]);
        if($request->has('categories')){
            // dd($request->categories);
            $menu->categories()->sync($request->categories);
        }
        return to_route('admin.menu.index')->with('success','menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Menu $menu)
    {
      Storage::delete($menu->image);
      $menu->categories()->detach();
      $menu->delete();
      return to_route('admin.menu.index')->with('danger','menu deleted successfully');
    }
}