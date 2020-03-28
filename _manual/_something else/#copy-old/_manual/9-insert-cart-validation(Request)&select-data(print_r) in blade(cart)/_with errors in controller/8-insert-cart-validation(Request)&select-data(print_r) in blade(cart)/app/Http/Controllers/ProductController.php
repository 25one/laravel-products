<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Repositories\ProductRepository;
//use App\Http\Requests\CartRequest;
//use App\Models\Product;
use App\ {
   Repositories\ProductRepository,
   Http\Requests\CartRequest,   
   Models\Product   
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
        $product = $this->model->find($id);
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
        if(isset($request->validator) && $request->validator->fails()) //if you need validator->errors() in Controller
        {
            return redirect(route('product', ['id' => $request->product_id]))->with('message-errors', $request->validator->errors()); //{"message":["The message field is required."]}
        }

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

}
