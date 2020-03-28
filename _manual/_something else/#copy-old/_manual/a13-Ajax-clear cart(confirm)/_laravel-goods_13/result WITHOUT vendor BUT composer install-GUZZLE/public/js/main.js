$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

var BaseRecord={

topothers: function(parameter){	
   //alert(parameter);
   var ajaxSetting={
      method: 'get',
      url: '/',
      data: {
         topothers: parameter,
      },
      success: function(data){
         //alert(data.table);
         $('#pannel').html(data.table);
      },
   };
   $.ajax(ajaxSetting);
},

clearone: function(id){  
   //alert(parameter);
   var ajaxSetting={
      method: 'post',
      url: '/clearone',
      data: {
         id: id,
      },
      success: function(data){
         //alert(data.table);
         //$('#pannel').html(data.table);
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);
},

cart: function(){  
   //alert(parameter);
   var ajaxSetting={
      method: 'get',
      url: '/cart',
      success: function(data){
         //alert(data.table);
         $('#pannel').html(data.table);
         $('.listbuttonremove').click(function(){
            BaseRecord.clearone($(this).attr('id')); 
            return false; //BECAUSE THIS IS <a>
         });            
      },
   };
   $.ajax(ajaxSetting);
},

order: function(pannel){  
   var arr_cart_name=pannel.getElementsByClassName('cart_name');
   var arr_cart_price=pannel.getElementsByClassName('cart_price');
   var content_order='Your order<br>';
   for(var i=0; i<arr_cart_name.length; ++i){
      content_order+=arr_cart_name[i].innerHTML+'<br>'+arr_cart_price[i].innerHTML+'<br><br>'; 
   }
   //$('#pannel').html(content_order);

   var ajaxSetting={
      method: 'post',
      url: '/toorder',
      data: {
         content: content_order,
      },      
      success: function(data){
         //alert(data.answer);
         var data_json=JSON.parse(data.answer);
         if(data_json['mail']) {
            alert('Your order has been sendes...');
            var later=confirm('Would you like to clean cart?');
            if(later){
               //alert('Yes'); 
               BaseRecord.clearall();  
            }
         }
      },
   };
   $.ajax(ajaxSetting);
},

clearall: function(){  
   //alert(parameter);
   var ajaxSetting={
      method: 'post',
      url: '/clearcart',
      success: function(data){
         //alert(data.table);
         //$('#pannel').html(data.table);
         BaseRecord.cart();
      },
   };
   $.ajax(ajaxSetting);
},

};