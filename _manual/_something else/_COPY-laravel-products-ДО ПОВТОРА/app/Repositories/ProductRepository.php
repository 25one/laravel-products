<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart,
    Message
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
    protected $model_message;

    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     * @param  \App\Models\Cart $cart
     * @param  \App\Models\Message $message          
     */
    public function __construct(Product $product, Cart $cart, Message $message)
    {
        $this->model_product = $product;
        $this->model_cart = $cart;   
        $this->model_message = $message;                  
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
            if(isset($request->top9)) $query->where('top9', $request->top9)->where('name', 'like', '%' . $request->search . '%');
            else $query->where('top9', 1);
        return $query->get();
    }

    /**
     * Create a query for Cart.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcCart($request)
    {
        $query = $this->model_cart
            ->select('id', 'name', 'price', 'image')
            //->where('top9', 1)
            ->orderBy('price', 'asc');
            //if(isset($request->top9)) $query->where('top9', $request->top9)->where('name', 'like', '%' . $request->search . '%');
            //else $query->where('top9', 1);
        return $query->get();
    }   

    /**
     * Store item to the cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cartstore($request)
    {
        //$this->model_cart->create($request->all());
        //Cart::create($request->all());
        $this->model_cart->name = $request->name;
        $this->model_cart->price = $request->price;
        $this->model_cart->image = $request->image; 
        $this->model_cart->save();               
    }  

    /**
     * Mailer for sending message and contact from site.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcMailer($request)
    {
        $this->model_message->create($request->all());

        $title = 'Message from site: ' . date('d-m-Y H:i:s');
        $message = 'Message: <b>' . $request->message . '</b><br>';
        $message .= 'Contact: <b>' . $request->contact . '</b><br>';        

        $client = new \GuzzleHttp\Client([
           'headers' => [
               //'Authorization' => '9267585bb333341dc049321d4e74398f',
               //'Content-Type' => 'application/json',
            ]
        ]);
        $response = $client->request('GET', 'http://api.25one.com.ua/api_mail.php?email_to=' . config('app.adminemail') . '&title=' . $title . '&message=' . $message,
         [
            //...
         ]);    
        //return json_decode($response->getBody()->getContents());  
        return response()->json([
                'answer' => $response->getBody()->getContents(),
            ]);
    }             

}
