@extends('back.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            @if (session('auto-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('auto-ok') !!}
                @endcomponent
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                     <div class="box-body">
                        <div class="form-group">
                          <img class="img_auto" src="@if(isset($image)){{asset('public/images/' . $image)}}@elseif(isset($auto)){{asset('public/images/' . $auto->image)}}@else{{asset('public/images/nophoto.jpg')}}@endif" alt="" style="width: 250px; margin-top: 5px;" />
                          <form method="post" action="{{ route('upload') }}" name="form_upload" enctype="multipart/form-data">
                                   {{ csrf_field() }}    
                              <input type="file" name="image" class="upload_field">
                              <button type="submit" class="upload_submit">Go</button>
                              <button type="button" class="btn btn-primary" style="width: 250px; margin-top: 5px;">Select</button>
                          </form>                            
                        </div>   
                    @yield('form-open')
                    <input type="hidden" id="image" name="image" value="@if(isset($image)){{$image}}@elseif(isset($auto)){{$auto->image}}@else{{'nophoto.jpg'}}@endif">  
                        <div class="form-group">
                            <label for="type">@lang('Type of Country')</label>
                            <select class="form-control" name="country_id" id="country_id">
                              @foreach($countries as $key => $country)  
                                 <option value="{{ $country->id }}"
                                 @if(isset($auto) && $auto->country_id == $country->id)
                                    {{'selected'}}
                                 @endif 
                                 >{{ $country->name }}</option>
                              @endforeach    
                            </select>
                        </div>                    
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">@lang('Name of Auto')</label>
                            <input type="text" class="form-control" id="name" name="name" value="@if(isset($auto)){{$auto->name}}@elseif(old('name')){{old('name')}}@endif" placeholder="Write Name of Auto"> 
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        @admin
                        <div class="form-group">
                            <label for="type">@lang('Active')</label>
                            <select class="form-control" name="active" id="active">
                               <option value="1"
                                    @if(isset($auto) && $auto->active == 1)
                                       {{ 'selected' }} 
                                    @endif
                                >active</option>
                               <option value="0"
                                    @if(isset($auto) && $auto->active == 0)
                                       {{ 'selected' }} 
                                    @endif
                               >no active</option>
                            </select>
                        </div> 
                        @endadmin                                         
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
});       
</script>
@endsection  

