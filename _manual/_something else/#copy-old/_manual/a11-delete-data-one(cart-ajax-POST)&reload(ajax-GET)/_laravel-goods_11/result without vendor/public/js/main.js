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

};