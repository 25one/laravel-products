@extends('product.layout')

@section('main')

    <div class="super_container_inner">

        <!-- Products -->

        <div class="products">
			<div class="container">
				<div class="row products_row">
                
                   @include('product.brick-standard')

				</div>
			</div>
		</div>

        <div class="button load_more ml-auto mr-auto"><a href="#" class="link_again">больше</a>

	</div>

@endsection

@section('js')
<script>
$(document).ready(function(){
   $('.load_more').click(function(){
      BaseRecord.top9=0;
      BaseRecord.more();
      return false;
   });
   //header_search_button
   $('.header_search_button').click(function(){
      //alert(777);
      BaseRecord.search=$('.search_input').val();
      BaseRecord.more();
      return false;
   });   
});
</script>
@endsection