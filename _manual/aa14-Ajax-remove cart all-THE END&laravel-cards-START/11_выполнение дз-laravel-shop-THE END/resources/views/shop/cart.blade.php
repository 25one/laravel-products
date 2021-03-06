@extends('shop.layout')

@section('main')

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">

@php
//print_r($carts);
@endphp

                  <!-- <div class="col-12 col-lg-8"> -->
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th class="center">Remove one</th>
                                    </tr>
                                </thead>
                                <tbody id="pannel">

                                @include('shop.cart-standard')

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                    -->
                </div>

              <div class="row">
                <div class="col-4 col-lg-4 center">
                   <div class="cart-btn">
                      <!-- <a href="cart.html" class="btn btn-danger w-100">Clear all Cart</a> -->
                      <!-- amado-btn w-100 -->
                      <button type="button" class="btn btn-danger w-100">Clear all Cart</button> 
                      <form name="form_clearall" method="post" action="{{route('clearall')}}">
                      {{ csrf_field() }}
                      </form>  
                   </div>                            
                </div>
              </div>

            </div>
        </div>

@endsection

@section('js')
<!-- <script src="{{ asset('public/js/main.js') }}"></script> -->
<script>
$(document).ready(function(){
   $('.btn.btn-danger.w-100').click(function(){
      //form_clearall.submit();
      BaseRecord.clearall();   
   });
   $('.listbuttonremove').click(function(){
      BaseRecord.clearone($(this).attr('id'));
      return false;
   });   
});
</script>
@endsection

