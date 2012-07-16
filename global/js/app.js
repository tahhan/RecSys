function encode_utf8( s ){
   return unescape( encodeURIComponent( s ) );
}

function decode_utf8( s ){
   return decodeURIComponent( escape( s ) );
}

function confirmDialog(url, name){

   if ( typeof(name) == 'undefined' ){

      name = "this item";

   }

   var x = confirm("Are you sure you want to delete (" + name + ") ?");

   if(x){

      document.location = url;

      return true;

   }else{

      return false;

   }

}

function ajaxLoad(target, url){

   $(target).hide().load(url).show();

}

function updateGET( field, field_value ){

   var this_url = window.location.href;



   if(this_url.indexOf('?') == -1 ){ //no params, add

      if(field_value == 'null'){
         return;
      }

      window.location = this_url + '?'+ field +'=' + field_value;

   }else{

      if(this_url.indexOf(field + '=') == -1){  //no sort param, append

         if(field_value == 'null'){
            return;
         }

         window.location = this_url + '&' + field + '=' + field_value;

      }else{  //param exist, replace

         var regex  =  new RegExp( '&?' + field + '=(\\w+)', 'img');

         window.location = (field_value != 'null') ? this_url.replace(regex, '&' + field + '=' + field_value) : this_url.replace(regex, '');

      }

   }

}


