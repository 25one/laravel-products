<?php

namespace App\Repositories;

use App\Models\ {
    Product
};

class ProductRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;


    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->model
            ->select('id', 'name', 'price', 'image');
            //->where('top9', '=', 1);
            //->where('top9', 1);
            //->orderBy('price', 'asc');
            if(isset($request->top9)) $query->where('top9', $request->top9)
                ->where('name', 'like', '%' . $request->search . '%');
            else $query->where('top9', 1);
            //if(isset($request->search)) $query->where('name', 'like', '%' . $request->search . '%');
        return $query->get();
    }

}
