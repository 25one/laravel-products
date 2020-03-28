<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart
};

class ProductRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model_product;
    protected $model_cart;    


    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(Product $product, Cart $cart)
    {
        $this->model_product = $product;
        $this->model_cart = $cart;        
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
            //->where('top9', '=', 1);
            //->where('top9', 1);
            //->orderBy('price', 'asc');
            if(isset($request->top9)) $query->where('top9', $request->top9)
                ->where('name', 'like', '%' . $request->search . '%');
            else $query->where('top9', 1);

        return $query->get();
    }

    /**
     * Store thing.
     *
     * @param  \App\Http\Requests\Request $request
     * @return void
     */
    public function funcStore($request)
    {
        //Cart::create($request->all());
        //$this->model_cart->create($request->all());
        $this->model_cart->name = $request->name;
        $this->model_cart->price = $request->price;
        $this->model_cart->image = $request->image;
        $this->model_cart->save();                
    }    

}
