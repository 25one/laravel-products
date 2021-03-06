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
            ->select('id', 'name', 'price', 'image')
            //->where('top9', '=', 1);
            ->where('top9', 1);
            //->orderBy('price', 'asc');
        return $query->get();
    }

}
