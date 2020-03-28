$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(document).ready(function(){
   $('.newsletter_button').click(function(){
      BaseRecord.mailer($('.newsletter_input.message').val(), $('.newsletter_input.email').val());   
   });
});

var BaseRecord={

top9: 1,
search: '',

more: function(){
   //alert(BaseRecord.top9);	
   var ajaxSetting={
      method: 'get',
      url: './', //vagrant - ./
      data: {
         top9: BaseRecord.top9,
         search: BaseRecord.search,
      },
      success: function(data){
      	 //alert(data.table);
         $('.row.products_row').html(data.table);
      },
   };
   $.ajax(ajaxSetting);
},

removeone: function(id){
   //alert(BaseRecord.top9);  
   var ajaxSetting={
      method: 'post',
      url: './clearone', //vagrant - ./
      data: {
         id: id,
      },
      success: function(data){
         //alert(data);
         //$('.row.products_row').html(data.table);
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);
},

cart: function(){
   //alert(BaseRecord.top9);  
   var ajaxSetting={
      method: 'get',
      url: './cart', //vagrant - ./
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data);
         //$('.row.products_row').html(data.table);
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
   //alert(BaseRecord.top9);  
   var ajaxSetting={
      method: 'post',
      url: './mailer', //vagrant - ./
      data: {
         message: message,
         contact: contact,         
      },
      success: function(data){
         //alert(data.answer); //!!!data.answer - {"mail":[true],"request":[true]}
         //alert(data); //!!!data - {"message":["The message field is required."],"contact":["The contact field is required."]}

         if(data.answer) {
            var data_json=JSON.parse(data.answer);
            if(data_json['mail']){
               $('.result_to_email').html('Your message has been successfully sent!');
               $('.result_to_email').css('color', 'green');
            }       
         } else {
            var data_json=JSON.parse(data);      
            var error_str='';
            for(var i in data_json){
               error_str+=data_json[i]+'\n';
            }  
            alert(error_str);    
         }

      },
   };
   $.ajax(ajaxSetting);
},

clearall: function(){
   //alert(BaseRecord.top9);  
   var ajaxSetting={
      method: 'post',
      url: './clearall', //vagrant - ./
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data);
         //$('.row.products_row').html(data.table);
         BaseRecord.cart(); //!!!ajax-обновление страницы
      },
   };
   $.ajax(ajaxSetting);
},

};