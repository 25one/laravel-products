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

};