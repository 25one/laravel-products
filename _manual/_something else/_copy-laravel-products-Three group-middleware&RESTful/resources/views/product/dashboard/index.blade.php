@extends('product.dashboard.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                      @if (session('product-updated'))
                          @component('product.dashboard.components.alert')
                              @slot('type')
                                  success
                              @endslot
                              {!! session('product-updated') !!}
                          @endcomponent
                      @endif
                      <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             @include('product.dashboard.brick-standard')
                         </tbody>    
                       </table>
                     </div>
                     <hr>                       
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

@endsection

@section('js')
    <script src="{{ asset('public/js/main.js') }}"></script>
    <script>
       $(document).ready(function(){
          $('.listbuttonremove').click(function(){
             BaseRecord.dashboarddestroy($(this).attr('href'));
             return false;
          });
       });
    </script>
@endsection    
