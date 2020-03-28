@extends('good.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
       <div class="col-md-12 col-md-12 col-md-12 margin">
            <div class="box box-primary">
                <div class="box-body">       
                   <h3>Home - List of goods</h3>
                   @php 
                   //print_r($goods); 
                   @endphp
                      <select class="topothers">
                         <option value="1">Top-9</option>
                         <option value="0">Others</option>                         
                      </select>
                      <table>
                         <thead>
                          <tr>
                            <!--
                            <td class="widthbutton">&nbsp;</td>
                            -->
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('good.brick-standard')
                          </tbody>    
                       </table>
                </div>
            </div>
       </div>  
    </div>

@endsection

@section('js')
<script src="{{ asset('public/js/main.js') }}"></script>
<script>
   $(document).ready(function(){
      $('.topothers').change(function(){
         BaseRecord.topothers($(this).val()); 
      });
   });
</script>
@endsection
