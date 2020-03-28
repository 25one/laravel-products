@foreach($products as $product)
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
   <td class="center"><img class="img_little" src="{{ asset('public/images/' . $product->image) }}" alt=""></td>
   <td>{{ $product->name }}</td> 
   <td>{{ $product->price }}</td>      
</tr>
@endforeach


