<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Repositories\ProductRepository;
//use App\Models\Product;
use App\ {
   Repositories\ProductRepository,    
   Models\Product,
   Models\Cart,   
   Http\Requests\CartRequest
};

class ProductController extends Controller
{

    protected $repository;
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
     * Show the home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //public function index(Request $request, ProductRepository $repository)
    public function index(Request $request)
    {
        //$products = $repository->funcSelect($request);
        $products = $this->repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        //return view('product.index', compact('products'));
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the product-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
        $product = $this->model_product->find($id);
        return view('product.product', ['product' => $product]);
    }

    /**
     * Show the cart-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        $carts = $this->repository->funcCart($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.cart-standard", ['carts' => $carts])->render(),
            ]);
        }         

        return view('product.cart', compact('carts'));
    }    

    /**
     * Store item to the cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(CartRequest $request)
    {
        $this->repository->cartstore($request);

        return redirect(route('cart'));
    } 

    /**
     * Delete all items from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall(Request $request)
    {
        $this->model_cart->truncate();

        // Ajax response
        if ($request->ajax()) {
            return response()->json();
        }         

        return redirect(route('cart'));
    }    

    /**
     * Delete one item from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeone(Request $request)
    {
        $cartone = $this->model_cart->find($request->id);

        $cartone->delete();
    }    

    /**
     * Mailer for sending message and contact from site.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mailer(Request $request)
    {
       return $this->repository->funcMailer($request);
    }        

}
