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
							@foreach($goods as $good)
							<tr>
							<!--
							<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
							-->
							   <td><img class="img_little" src="{{ asset('public/images/' . $good->image) }}" alt /></td> 
							   <td>{{ $good->name }}</td>      
							   <td>{{ $good->price }}</td>   
							</tr>
							@endforeach
                         </tbody>    
                       </table>