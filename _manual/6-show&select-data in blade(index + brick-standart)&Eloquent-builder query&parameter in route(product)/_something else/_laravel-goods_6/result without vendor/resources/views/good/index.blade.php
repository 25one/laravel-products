@extends('good.layout')

@section('main')

    <div class="row">
       <div class="col-md-12 col-md-12 col-md-12 margin">
            <div class="box box-primary">
                <div class="box-body">       
                   <h3>Home - List of goods</h3>
                   @php 
                   //print_r($goods); 
                   @endphp
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

