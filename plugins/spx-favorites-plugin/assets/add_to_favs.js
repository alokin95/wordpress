jQuery(document).ready(function($){
   $('.add-to-favs-button').on('click', function() {

       let data = {
           'action': 'add_to_favs'
       };

       $.post(ajax_object.ajax_url, data, function(response) {
         console.log(response);
       })
   });
});