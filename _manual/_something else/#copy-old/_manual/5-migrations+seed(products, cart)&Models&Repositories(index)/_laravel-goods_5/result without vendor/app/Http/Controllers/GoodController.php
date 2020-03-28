<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GoodRepository;

class GoodController extends Controller
{

    /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\ProductRepository
     */
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GoodRepository $good)
    {
        //$this->middleware('auth');
        $this->repository = $good;

    }

    /**
     * Show the application of home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $goods = $this->repository->funcSelect($request);
        return view('good.index', ['goods' => $goods]);
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
