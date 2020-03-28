@extends('product.layout')

@section('css')
   <link rel="stylesheet" type="text/css" href="{{ asset('public/styles/cart.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('public/styles/cart_responsive.css') }}">
@endsection

@section('main')

        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="cart_container">
                            
                            <!-- Cart Items -->
                            <div class="cart_items">
                                <ul class="cart_items_list">

                                   @php
                                      print_r($cart);
                                   @endphp

                                </ul>
                            </div>

                            <!-- Cart Buttons -->
                            <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="button button_clear trans_200"><a href="#">clear</a></div>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>                        

@endsection