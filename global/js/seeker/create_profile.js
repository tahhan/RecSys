$(document).ready(function(){
   $( "#DOB" ).datepicker({
      altField: '#actualDate' , 
      altFormat: 'yy-mm-dd',
      changeYear: true
   });
});

function addMoreLang(){
   var count = $('#lang_list').children('.form-element').length;
   var lang = $('#lang').clone().removeAttr('id');
   lang.children('.lang_name').attr('name', 'languages[' +  count +'][name]').removeClass('validate[required]').removeAttr('id');
   lang.children('.lang_proficiency').attr('name', 'languages[' +  count +'][proficiency]').removeClass('validate[required]').removeAttr('id');
   lang.append('<a href="#0" onclick="delLine($(this))">[Remove]</a>');
   $('#add_more').before(lang);
   //lang.appendTo('#lang_list');
   return false;
}

function addMoreNation(){
   var nation = $('#nation').clone().removeAttr('id');
   nation.removeClass('validate[required]');
   nation.children('#nation-element').removeAttr('id');
   nation.append('<a href="#0" onclick="delLine($(this))">[Remove]</a>');
   $('#add_more_nation').before(nation);
}

function delLine(a){
   var del_div =a.parent('div.form-element');
   del_div.remove();
}