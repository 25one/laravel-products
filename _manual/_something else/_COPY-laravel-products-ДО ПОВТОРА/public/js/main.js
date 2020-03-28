$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

/*
$(document).ready(function(){
   $('.load_more').click(function(){
      BaseRecord.top9=0;
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
      url: './',
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

removeone: function(id){
   var ajaxSetting={
      method: 'post',
      url: './removeone',
      data: {
        id: id,
      },
      success: function(data){
         //alert(data);
         //alert(data.table);
         //$('.row.products_row').html(data.table);
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);
},

removeall: function(){
   var ajaxSetting={
      method: 'post',
      url: './clearall', //submit or ajax
      //data: {
      //  id: id,
      //},
      success: function(data){
         //alert(data);
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
      url: './cart',
      //data: {
      //  top9: this.top9,
      //  search: this.search,
      //},
      success: function(data){
         //alert(data.table);
         $('.cart_items_list').html(data.table);
         $('.listbuttonremove').click(function(){
            BaseRecord.removeone($(this).attr('id'));  
            return false; 
         });            
      },
   };
   $.ajax(ajaxSetting);
},

mailer: function(message, contact){
   var ajaxSetting={
      method: 'post',
      url: './mailer',
      data: {
        message: message,
        contact: contact,
      },
      success: function(data){
         //alert(data.answer);
         var data_json=JSON.parse(data.answer);
         if(data_json['mail']){
            $('.result_to_email').html('Your message has been successfully sended...');
            $('.result_to_email').css('color', 'green');            
         }

      },
   };
   $.ajax(ajaxSetting);
},

};