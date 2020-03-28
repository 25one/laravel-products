<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Repositories\ProductRepository;
use App\ {
   Repositories\ProductRepository,
   Models\Product,
   Models\Cart,   
   Http\Requests\CartRequest,
   Http\Requests\MailerRequest

};

class ProductController extends Controller
{

    /**
     * The Controller instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $repository;
    protected $model_product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct(ProductRepository $repository)
    //public function __construct(Product $product)
    public function __construct(ProductRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
        //$this->model_product = $product;
    }

    /**
     * Show the application home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$products = $this->repository->funcSelect($request);
        $products = $this->repository->funcSelect($request);

        //print_r($products); die;

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view('product.index', ['products' => $products]); //compact('products')
    }

    /**
     * Show the application product-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product(Product $model_product, $id)
    {
        //$product = $this->model_product->find($id);
        $product = $model_product->find($id);

        return view('product.product', ['product' => $product]); //compact('product')
    }

    /**
     * Show the application cart-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        
        $carts = $this->repository->fromCart();

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.cart-standard", ['carts' => $carts])->render(),
            ]);
        } 

        return view('product.cart', ['carts' => $carts]);
    }

    /**
     * Add to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(CartRequest $request)
    {
        $this->repository->store($request);

        return redirect(route('cart'));
    } 

    /**
     * Clear all cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall(Request $request, Cart $cart)
    {
        //$this->repository->destroycart();
        $cart->truncate();

        // Ajax response
        if ($request->ajax()) {
            return response()->json();
        } 

        return redirect(route('cart'));
    } 

    /**
     * Clear one from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearone(Request $request, Cart $cart)
    {
        //$this->repository->destroyone($request);

        $clearone = $cart->find($request->id);
        $clearone->delete();

        //return redirect(route('cart'));
    }

    /**
     * Mailer for message and contact.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mailer(MailerRequest $request)
    {
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() in Controller
        {
            return json_encode($request->validator->errors());
        }

        return $this->repository->mailer($request);
    }    

}
