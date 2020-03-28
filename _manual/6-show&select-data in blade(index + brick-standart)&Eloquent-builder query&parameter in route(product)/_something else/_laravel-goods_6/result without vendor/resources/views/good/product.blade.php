@extends('good.layout')

@section('main')

@php
print_r($product);
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
                        <div class="image"><img src="" alt /></div> 
                    </div>
                    <div class="form-group">
                        <label for="type">Name</label>
                        <div class="name"></div>
                    </div>
                    <div class="form-group">
                        <label for="user">Price</label>
                        <div class="price"></div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary">to Cart</button>
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

