<?php

namespace App\Repositories;

use App\Models\ {
    Product
};

class ShopRepository
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
            ->select('id', 'name', 'price', 'image')
            ->orderBy('price', 'asc');

        if(isset($request->search)) $query->where('name', 'like', '%' . $request->search . '%');

        return $query->get();
    }

}
