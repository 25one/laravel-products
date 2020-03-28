@foreach($goods as $good)
<tr>
@if (\Request::is('cart'))
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
@endif
   <td>
      @if (\Request::is('/'))
      <a href="{{ route('product', ['id' => $good->id]) }}">
      @endif
         <img class="img_little" src="{{ asset('public/images/' . $good->image) }}" alt />
      @if (\Request::is('/'))
      </a>
      @endif
   </td> 
   <td>{{ $good->name }}</td>      
   <td>{{ $good->price }}</td>   
</tr>
@endforeach


