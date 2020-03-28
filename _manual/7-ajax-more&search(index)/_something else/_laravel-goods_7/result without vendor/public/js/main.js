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

};