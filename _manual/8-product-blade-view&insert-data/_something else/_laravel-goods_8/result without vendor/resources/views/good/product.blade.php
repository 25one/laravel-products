@extends('good.layout')

@section('main')

@php
//print_r($product);
@endphp

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="image"><img class="img_little" src="{{ asset('public/images/' . $product->image) }}" alt /></div> 
                    </div>
                    <div class="form-group">
                        <label for="type">Name</label>
                        <div class="name">{{ $product->name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="user">Price</label>
                        <div class="price">{{ $product->price }}</div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary button_tocart">to Cart</button>
                    <form name="form_tocart" method="post" action="{{ url('/tocart') }}" style="display: none;">
                                          {{ csrf_field() }}
                       <input type="hidden" name="image" value="{{ $product->image }}" />
                       <input type="hidden" name="name" value="{{ $product->name }}" />
                       <input type="hidden" name="price" value="{{ $product->price }}" />
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
@endsection

@section('js')
<script>
   $(document).ready(function(){
      $('.button_tocart').click(function(){
         form_tocart.submit(); 
      });
   });
</script>
@endsection


