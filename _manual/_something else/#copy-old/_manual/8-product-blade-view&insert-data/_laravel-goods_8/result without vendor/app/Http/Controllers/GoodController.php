<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GoodRepository;
use App\Models\Product;

class GoodController extends Controller
{

    /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\ProductRepository
     */
    protected $repository;
    protected $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GoodRepository $good, Product $product)
    {
        //$this->middleware('auth');
        $this->repository = $good;
        $this->model = $product;

    }

    /**
     * Show the application of home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $goods = $this->repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("good.brick-standard", ['goods' => $goods])->render(),
            ]);
        } 

        return view('good.index', ['goods' => $goods]);
    }

    /**
     * Show the application of home-product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
        $product = $this->model->find($id); 
        return view('good.product', ['product' => $product]);
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

    /**
     * Store thing to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(Request $request)
    {
        $this->repository->store($request);
        return redirect(route('home'));
    }                 
}
