<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
   Repositories\ShopRepository,
   Models\Product,
   Http\Requests\CartRequest

};

class ShopController extends Controller
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
     * Show the application home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, ShopRepository $repository)
    {
        $products = $repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("shop.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view('shop.index', ['products' => $products]);
    }

    /**
     * Show the application product-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id, Product $model_product)
    {
        $product = $model_product->find($id);

        return view('shop.product', ['product' => $product]);
    }

    /**
     * Show the application cart-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(ShopRepository $repository)
    {
        $carts = $repository->fromCart();

        return view('shop.cart', compact('carts'));
    }  

    /**
     * Store thing to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(CartRequest $request, ShopRepository $repository)
    {
        $repository->store($request);
        
        return redirect(route('cart'));
    }          
        
}
