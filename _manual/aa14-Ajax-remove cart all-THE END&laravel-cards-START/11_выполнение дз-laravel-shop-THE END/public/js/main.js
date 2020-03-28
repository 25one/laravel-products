$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(document).ready(function(){
   $('.button_substribe').click(function(){
      BaseRecord.mailer($('.text_substribe').val());
      return false;
   });
});

var BaseRecord={

search: function(value){
   var ajaxSetting={
      method: 'get',
      url: './', //vagrant ./
      data: {
         search: value,
      },
      success: function(data){
         //alert(data.table);
         $('.amado-pro-catagory').html(data.table);
      },
   };
   $.ajax(ajaxSetting);	   
},

clearone: function(id){
   var ajaxSetting={
      method: 'post',
      url: './clearone',
      data: {
         id: id,
      },
      success: function(data){
         //alert(data);
         BaseRecord.cart();

      },
   };
   $.ajax(ajaxSetting); 
},

clearall: function(){
   var ajaxSetting={
      method: 'post',
      url: './clearall',
      //data: {
      //   id: id,
      //},
      success: function(data){
         //alert(data);
         BaseRecord.cart();

      },
   };
   $.ajax(ajaxSetting); 
},

cart: function(){ 
   var ajaxSetting={
      method: 'get',
      url: './cart',
      success: function(data){
         //alert(data.table);
         $('#pannel').html(data.table);
         $('.listbuttonremove').click(function(){ 
            BaseRecord.clearone($(this).attr('id'));
            return false;
         });         
      },
   };
   $.ajax(ajaxSetting); 
},

mailer: function(value){
   var ajaxSetting={
      method: 'post',
      url: './mailer',
      data: {
         email: value,
      },
      success: function(data){
         //alert(data.answer); //!!!data.answer - {"mail":[true],"request":[true]}
         //alert(data); //!!!data - {"email":["The email must be a valid email address."]}
         if(data.answer) {
            var data_json=JSON.parse(data.answer);
            if(data_json['mail']) alert('We sent the message to your email!'); 
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

};