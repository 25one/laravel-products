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
        //$req = 'кост'; 
        $query = $this->model_product
            ->select('id', 'name', 'price', 'image');
            //->where('top9', '=', 1);
            //->where('price', '>', 10)
            //->where('name', 'like', '%' . $req . '%')
            //->orderBy('price', 'asc');

        if(isset($request->top9)) $query->where('top9', $request->top9)->where('name', 'like', '%' . $request->search . '%');
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
    public function fromCart()
    {
        $query = $this->model_cart
            ->select('id', 'name', 'price', 'image');

        return $query->get();
    }

    /**
     * Destroy all Cart.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function destroycart()
    {
        $this->model_cart->truncate();
    } 

    /**
     * Clear one from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroyone($request)
    {
        $clearone = $this->model_cart->find($request->id);
        $clearone->delete();
    }

    /**
     * Mailer for message and contact.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mailer($request)
    {
        //$this->model_message->create($request->all());
        Message::create($request->all());

        $title = 'Message from user - ' . date('d-m-Y');
        $message = 'Message: ' . $request->message . '<br>';
        $message .= 'Contact: ' . $request->contact;    
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
