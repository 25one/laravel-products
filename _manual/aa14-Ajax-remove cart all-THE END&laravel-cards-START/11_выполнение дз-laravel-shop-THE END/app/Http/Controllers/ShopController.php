<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
   Repositories\ShopRepository,
   Models\Product,
   Models\Cart,
   Http\Requests\CartRequest,
   Http\Requests\SubstribeRequest  

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
    public function cart(Request $request, ShopRepository $repository)
    {
        $carts = $repository->fromCart();

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("shop.cart-standard", ['carts' => $carts])->render(),
            ]);
        } 

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

    /**
     * Destroy all cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall(Request $request, Cart $cart)
    {
        $cart->truncate();

        // Ajax response
        if ($request->ajax()) {
            return response()->json();
        }         
        
        return redirect(route('cart'));
    }    

    /**
     * Destroy one from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearone(Request $request, Cart $cart)
    {
        $cart->find($request->id)->delete();
    }

    /**
     * Mailer of sending message.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function mailer(SubstribeRequest $request, ShopRepository $repository)
    {
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() in Controller
        {
            return json_encode($request->validator->errors());
        }
   
        return $repository->mailer($request);
    }                                
        
}
