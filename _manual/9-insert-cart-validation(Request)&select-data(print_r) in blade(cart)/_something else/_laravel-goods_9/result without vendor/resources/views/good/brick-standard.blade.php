@foreach($goods as $good)
<tr>
<!--
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
-->
   <td><a href="{{ route('product', ['id' => $good->id]) }}"><img class="img_little" src="{{ asset('public/images/' . $good->image) }}" alt /></a></td> 
   <td>{{ $good->name }}</td>      
   <td>{{ $good->price }}</td>   
</tr>
@endforeach


