<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodController extends Controller
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
     * Show the application of home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('good.index');
    }

    /**
     * Show the application of home-product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product()
    {
        return view('good.product');
    }

    /**
     * Show the application of cart-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        return view('good.cart');
    }        
}
