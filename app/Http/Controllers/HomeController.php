<?php

namespace App\Http\Controllers;

use App\Category;
use App\Menu;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('welcome')->with('menus',$menus)->with('categories',$categories);
    }
}
