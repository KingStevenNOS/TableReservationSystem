<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $menus = Menu::all();
        return view('admin.menu.index')->with('menus',$menus)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menu.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'food_name' => 'required',
            'food_description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png|max:1500',
            'price' => 'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->food_name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/menus',$imagename);
        }
        else{
            $imagename = 'default.png';
        }

        $menu = new Menu();
        $menu->category = $request->category;
        $menu->food_name = $request->food_name;
        $menu->food_description = $request->food_description;
        $menu->image = $imagename;
        $menu->price = $request->price;
        $menu->save();
        return redirect()->route('menu.index')->with('successMsg','Food Item successfully Added');
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
        $menu = Menu::find($id);
        $categories = Category::all();
        $category = Category::find($id);
        return view('admin.menu.edit')->with('menu',$menu)->with('categories', $categories);
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
        $this->validate($request, [
            'category' => 'required',
            'food_name' => 'required',
            'food_description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png|max:1500',
            'price' => 'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->food_name);
        $menu = Menu::find($id);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '-' . $image->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/menus', $imagename);
        } else {
            $imagename = 'default.png';
        }

        $menu->category = $request->category;
        $menu->food_name = $request->food_name;
        $menu->food_description = $request->food_description;
        $menu->image = $imagename;
        $menu->price = $request->price;
        $menu->save();
        return redirect()->route('menu.index')->with('successMsg', 'Food Item successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if(file_exists('storage/menus/' . $menu->image)){
            unlink('storage/menus/' . $menu->image);
        }
        $menu->delete();
        return redirect()->back()->with('successMsg','Food Item Successfully Removed');
    }
}
