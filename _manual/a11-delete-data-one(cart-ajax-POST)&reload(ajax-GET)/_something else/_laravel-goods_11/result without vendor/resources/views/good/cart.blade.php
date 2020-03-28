@extends('good.layout')

@section('main')

    <div class="row">
       <div class="col-md-12 col-md-12 col-md-12 margin">
            <div class="box box-primary">
                <div class="box-body">       
                   <h3>Cart</h3>
                   @php
                   //print_r($goods); 
                   @endphp
                       <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('good.brick-standard')
                          </tbody>    
                       </table>  
                       <hr>
		               <div class="box-footer">
		                    <button type="button" class="btn btn-danger button_clearcart">Clear Cart</button>
		                    <form name="form_clearcart" method="post" action="{{ route('clearcart') }}" style="display: none;">
		                                          {{ csrf_field() }}
		                    </form>
		               </div>                                        
                </div>
            </div>
       </div>  
    </div>

@endsection

@section('js')
<script src="{{ asset('public/js/main.js') }}"></script>
<script>
   $(document).ready(function(){
      $('.button_clearcart').click(function(){
         form_clearcart.submit(); 
      });
      $('.listbuttonremove').click(function(){
         BaseRecord.clearone($(this).attr('id')); 
         return false; //BECAUSE THIS IS <a>
      });      
   });
</script>
@endsection