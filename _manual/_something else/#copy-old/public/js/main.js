$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

/*
$(document).ready(function(){
   //alert('hi');
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
         //location.href='/cart';
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);   
},

clearall: function(){
   var ajaxSetting={
      method: 'post', //routes\web.php
      url: '/clearall', //routes\web.php
      success: function(data){
         //alert(data.table);
         //$('.row.products_row').html(data.table);
         //location.href='/cart';
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);   
},

cart: function(){
   var ajaxSetting={
      method: 'get',
      url: '/cart',
      //data: {
      //   id: id,
      //},
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

mailer: function(message, contact){
   var ajaxSetting={
      method: 'post',
      url: '/mailer',
      data: {
         message: message,
         contact: contact,
      },
      success: function(data){
         //alert(data.answer);
         //alert(data);
         
         if(data.answer) {
            var data_json=JSON.parse(data.answer);
            if(data_json['mail']) {
               $('.result_to_email').html('Your message has been sending...');
               $('.result_to_email').css('color', 'green');
            }
         }
         else {
            //$('.result_to_email').html('There is any mistake...');
            //$('.result_to_email').css('color', 'red');
            var data_json=JSON.parse(data);
            var errors='';
            for(var i in data_json) {
               errors+=data_json[i];
            }
            $('.result_to_email').html(errors);
            $('.result_to_email').css('color', 'red');            
         }

      },
   };
   $.ajax(ajaxSetting);   
},

};