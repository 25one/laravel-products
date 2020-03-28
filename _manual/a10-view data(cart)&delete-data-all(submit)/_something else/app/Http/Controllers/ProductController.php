<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Repositories\ProductRepository;
//use App\Http\Requests\CartRequest;
//use App\Models\Product;
use App\ {
   Repositories\ProductRepository,
   Http\Requests\CartRequest,   
   Models\Product,
   Models\Cart

};

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
    protected $model_product;  
    protected $model_cart;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $repository, Product $product, Cart $cart)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
        $this->model_product = $product;   
        $this->model_cart = $cart;                
    }

    /**
     * Show page home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = $this->repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show page product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
        $product = $this->model_product->find($id);
        return view('product.product', ['product' => $product]);
    }

    /**
     * Store thing to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //public function tocart(Request $request)
    public function tocart(CartRequest $request)
    {
        $this->repository->funcStore($request);
        return redirect(route('cart'));
    }    

    /**
     * Show page cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart()
    {
        $cart = $this->repository->funcCart();
        return view('product.cart', ['cart' => $cart]);
    }

    /**
     * Clear cart(all).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall()
    {
        $this->model_cart->truncate();
        return redirect(route('home'));
    }

}
