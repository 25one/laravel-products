<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * The ProductRepository instance.
     *
     * @var \App\Repositories\ProductRepository
     */
    protected $repository;

    /**
     * The Model instance.
     *
     * @var \App\Models\Product
     */
    protected $model;    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $repository, Product $product)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
        $this->model = $product;        
    }

    /**
     * Show page home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = $this->repository->funcSelect($request);
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show page product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
        $product = $this->model->find($id);
        return view('product.product', ['product' => $product]);
    }

    /**
     * Show page cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        return view('product.cart');
    }    

}
