@extends('shop.layout')

@section('main')

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">

@php
//print_r($products);
@endphp
            
            <div class="amado-pro-catagory clearfix">

               @include('shop.brick-standard')

            </div>
        </div>
        <!-- Product Catagories Area End -->

@endsection