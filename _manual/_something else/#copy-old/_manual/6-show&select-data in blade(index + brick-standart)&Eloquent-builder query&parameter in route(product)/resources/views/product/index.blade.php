@extends('product.layout')

@section('main')

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Products -->

        <div class="products">
            <div class="container">
                <div class="row products_row">

                   <?php 
                   //print_r($products); 
                   ?>

                   @include('product.brick-standard')

                </div>
            </div>
        </div>
        
    </div>

@endsection