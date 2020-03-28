@extends('product.dashboard.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            @if (session('product-ok'))
                @component('product.dashboard.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('product-ok') !!}
                @endcomponent
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                     <div class="box-body">
                        <div class="form-group">
                          <img class="" src="@if(isset($image)){{asset('public/images/' . $image)}}@elseif(isset($product)){{asset('public/images/' . $product->image)}}@else{{asset('public/images/nophoto.jpg')}}@endif" alt="" style="width: 250px; margin-top: 5px;" />
                          <form method="post" action="{{ route('upload') }}" name="form_upload" enctype="multipart/form-data">
                                   {{ csrf_field() }}    
                              <input type="file" name="image" class="upload_field">
                              <button type="submit" class="upload_submit">Go</button>
                              <button type="button" class="btn btn-primary" style="width: 250px; margin-top: 5px;">Select</button>
                          </form>                            
                        </div>   
                    @yield('form-open')
                    <input type="hidden" id="image" name="image" value="@if(isset($image)){{$image}}@elseif(isset($product)){{$product->image}}@else{{'nophoto.jpg'}}@endif">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">@lang('Name of Product')</label>
                            <input type="text" class="form-control" id="name" name="name" value="@if(isset($product)){{$product->name}}@elseif(old('name')){{old('name')}}@endif" placeholder="Write Name of Product"> 
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="name">@lang('Price of Product')</label>
                            <input type="text" class="form-control" id="price" name="price" value="@if(isset($product)){{$product->price}}@elseif(old('price')){{old('price')}}@endif" placeholder="Write Price of Product"> 
                            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                        </div>
                                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
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
  $("body").on("change", ".upload_field", function(){
    //alert('hi');
    $(".upload_submit").click();
  });
  //...
});       
</script>
@endsection  

