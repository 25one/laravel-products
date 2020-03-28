$(document).ready(function(){
   //alert('hi');
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

};