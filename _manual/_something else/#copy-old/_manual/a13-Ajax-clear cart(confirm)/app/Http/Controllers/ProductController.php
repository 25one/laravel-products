<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CartRequest;
//use App\Repositories\ProductRepository;
//use App\Models\Product;
use App\ {
   Http\Requests\CartRequest,
   Http\Requests\MailerRequest,   
   Repositories\ProductRepository,
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
     * The Models instance.
     *
     * @var \App\Models\Product
     * @var \App\Models\Cart     
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
     * Show the home page.
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
     * Show the product page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product($id)
    {
        //$product = $this->model_product->find($id);
        $product = $this->repository->funcProduct($id);
        return view('product.product', ['product' => $product]);
    }

    /**
     * Show the cart page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        $cart = $this->repository->funcCart();

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.cart-standard", ['cart' => $cart])->render(),
            ]);
        } 

        return view('product.cart', ['cart' => $cart]);
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
     * Clear cart(all).
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
     * Clear cart(one).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */    
    public function clearone(Request $request)
    {
        $cartone = $this->model_cart->find($request->id);
        $cartone->delete();
        //return redirect(route('cart'));
    }

    /**
     * Mailer of sending message and contact.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    //public function mailer(Request $request)
    public function mailer(MailerRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() in Controller
        {
            return json_encode($request->validator->errors());
        }

        return $this->repository->funcMailer($request);
    }

}
