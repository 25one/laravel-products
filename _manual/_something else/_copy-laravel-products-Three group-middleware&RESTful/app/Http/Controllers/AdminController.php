<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
   Repositories\AdminRepository,    
   Models\Product,
   Http\Requests\ProductRequest
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

    /**
     * Create a new view for creating a new product in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */    
    public function create()
    {
       return view('product.dashboard.products.create');
    }

    /**
     * Upload a new image for creating a new product in storage.
     *
     * @param  ...
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $file = $request->image;         
        $filecontent = $file->openFile()->fread($file->getSize());  
        $filename = date('YmdHis') . $file->getClientOriginalName();  
        $file->move(public_path() . '/images/', $filename);
        return view('product.dashboard.products.create', ['image' => $filename]);
    }    

    /**
     * Store a newly created product in storage.
     *
     * @param  \App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       $this->repository->store($request); 
       return redirect(route('products.create'))->with('product-ok', 'New product has been successlully created...');
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) //!!!RESTful-controllers
    {
       return view('product.dashboard.products.edit', compact('product')); //or ['product' => $product]
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */    
    public function update(ProductRequest $request, Product $product)
    {
       $this->repository->update($request, $product); 
       return redirect(route('dashboard'))->with('product-updated', 'New product has been successlully updated...');
    } 

    /**
     * Remove the product from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(); 
    }                 

}
