<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart
};

class GoodRepository
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
     * @param  \App\Models\Cart $cart     
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
            //->where('top9', 1);
            //->orderBy('price', 'desc');
            if(isset($request->topothers)) $query->where('top9', $request->topothers);
            else $query->where('top9', 1);    
        return $query->get();
    }

    /**
     * Store thing.
     *
     * @param  \App\Http\Requests\Request $request
     * @return void
     */
    public function store($request)
    {  
       //$this->model_cart->create($request->all());   
       //Cart::create($request->all());  
       $this->model_cart->name = $request->name;
       $this->model_cart->price = $request->price;
       $this->model_cart->image = $request->image;   
       $this->model_cart->save();           
    }   

    /**
     * Create a query for Cart.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function showCart()
    {
        $query = $this->model_cart
            ->select('id', 'name', 'price', 'image');
        return $query->get();
    }

    /**
     * Mailer order.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orderMailer($content)
    {
        $title = 'Order from shop.com ' . date('d-m-Y H:i:s');
        $client = new \GuzzleHttp\Client([
           'headers' => [
               //'Authorization' => '9267585bb333341dc049321d4e74398f',
               //'Content-Type' => 'application/json',
            ]
        ]);
        $response = $client->request('GET', 'http://api.25one.com.ua/api_mail.php?email_to=' . config('app.adminemail') . '&title=' . $title . '&message=' . $content,
         [
            //...
         ]);    
        //return json_decode($response->getBody()->getContents());  
        return response()->json([
                'answer' => $response->getBody()->getContents(),
            ]);
    }                  

}
