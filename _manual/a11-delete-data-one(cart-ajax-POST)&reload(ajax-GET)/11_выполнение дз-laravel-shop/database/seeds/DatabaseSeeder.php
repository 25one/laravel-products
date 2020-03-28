<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Products        
        Product::create(
            [
                'name' => 'Modern Chair',
                'price' => '180$',
                'image' => 'bg-img/1.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Minimalistic Plant Pot',
                'price' => '180$',
                'image' => 'bg-img/2.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Modern Chair',
                'price' => '180$',
                'image' => 'bg-img/3.jpg',
                'top9' => 1,
            ]
        );   
        Product::create(
            [
                'name' => 'Night Stand',
                'price' => '180$',
                'image' => 'bg-img/4.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Plant Pot',
                'price' => '18$',
                'image' => 'bg-img/5.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Small Table',
                'price' => '320$',
                'image' => 'bg-img/6.jpg',
                'top9' => 1,
            ]
        );          
        Product::create(
            [
                'name' => 'Metallic Chair',
                'price' => '318$',
                'image' => 'bg-img/7.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Modern Rocking Chair',
                'price' => '318$',
                'image' => 'bg-img/8.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Home Deco',
                'price' => '318$',
                'image' => 'bg-img/9.jpg',
                'top9' => 1,
            ]
        );                                 
    }
}
