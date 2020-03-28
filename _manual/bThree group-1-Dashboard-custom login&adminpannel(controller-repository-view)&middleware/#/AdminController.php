<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
   Repositories\AdminRepository,    
   Models\Product
   //Http\Requests\ProductRequest
};

class AdminController extends Controller
{

    protected $repository;
    protected $model_product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminRepository $repository, Product $product)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
        $this->model_product = $product;
    }

    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products = $this->repository->funcSelect($request);

        // Ajax response
        if ($request->ajax()) {
            return response()->json([
                'table' => view("product.dashboard.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view('product.dashboard.index', ['products' => $products]); //or compact('products')
    }

}
