$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

/*
$(document).ready(function(){
   $('.load_more').click(function(){
      BaseRecord.top9 = 0;
      BaseRecord.more();
      return false;
   });
});
*/


var BaseRecord={

top9: 1,
search: '',

more: function(){
   var ajaxSetting={
      method: 'get',
      url: '/',
      data: {
         top9: this.top9,
         search: this.search,	
      },
      success: function(data){
         //alert(data.table);
         $('.row.products_row').html(data.table);
      },
   };
   $.ajax(ajaxSetting);	
},

clearone: function(id){
   var ajaxSetting={
      method: 'post',
      url: '/clearone',
      data: {
         id: id,
      },
      success: function(data){
         //alert(data.table);
         //$('.row.products_row').html(data.table);
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting); 
},

cart: function(){
   var ajaxSetting={
      method: 'get',
      url: '/cart',
      success: function(data){
         //alert(data.table);
         $('.cart_items_list').html(data.table);
         $('.listbuttonremove').click(function(){
            BaseRecord.clearone($(this).attr('id'));
            return false;
         });         
      },
   };
   $.ajax(ajaxSetting); 
},

};