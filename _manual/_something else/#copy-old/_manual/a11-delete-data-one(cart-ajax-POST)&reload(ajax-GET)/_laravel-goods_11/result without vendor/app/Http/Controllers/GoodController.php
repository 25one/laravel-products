<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GoodRepository;
use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Models\Cart;

class GoodController extends Controller
{

    /**
     * The GoodController instance.
     *
     * @var \App\Http\Controllers\GoodController
     */
    protected $repository;
    protected $model_product;
    protected $model_cart;    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GoodRepository $good, Product $product, Cart $cart)
    {
        //$this->middleware('auth');
        $this->repository = $good;
        $this->model_product = $product;
        $this->model_cart = $cart;
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
        $product = $this->model_product->find($id); 
        return view('good.product', ['product' => $product]);
    }

    /**
     * Show the application of cart-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        $goods = $this->repository->showCart();

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("good.brick-standard", ['goods' => $goods])->render(),
            ]);
        } 

        return view('good.cart', ['goods' => $goods]);
    }

    /**
     * Store thing to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //public function tocart(Request $request)
    public function tocart(CartRequest $request)
    {
        $this->repository->store($request);
        return redirect(route('home'));
    }  

    /**
     * Clear cart(all).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearcart()
    {
        $this->model_cart->truncate();
        return redirect(route('home'));
    }  

    /**
     * Clear cart(one).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearone(Request $request)
    {
        $cart = $this->model_cart->find($request->id);
        $cart->delete();
        //return redirect(route('cart'));
    }  

}
