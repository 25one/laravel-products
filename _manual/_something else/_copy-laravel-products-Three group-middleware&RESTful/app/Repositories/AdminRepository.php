<?php

namespace App\Repositories;

use App\Models\ {
    Product

};

class AdminRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_product;

    /**
     * Create a new AdminRepository instance.
     *
     * @param  \App\Models\Product $product  
     */
    public function __construct(Product $product)
    {
        $this->model_product = $product;
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->model_product
            ->select('id', 'name', 'price', 'image');
            //->where('top9', 1)
            //->orderBy('price', 'asc');
            //if(isset($request->top9)) $query->where('top9', $request->top9)->where('name', 'like', '%' . $request->search . '%');
            //else $query->where('top9', 1);
        return $query->get();
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
       $this->model_product->name = $request->name; 
       $this->model_product->price = $request->price; 
       $this->model_product->image = $request->image; 
       return $this->model_product->save();               
    } 

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */    
    public function update($request, $product)
    {
       $product->name = $request->name; 
       $product->price = $request->price; 
       $product->image = $request->image; 
       return $product->save(); 
    }    

}
