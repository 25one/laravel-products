//$(document).ready(function(){
   //alert('hi');
//});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

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

};