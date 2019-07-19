jQuery(document).ready(function($){
   $('.add-to-favs-button').on('click', function() {

       let self = $(this);

       let post_id = $(this).data('id');
       let data = {
           'action': 'add_to_favs',
           'post_id': post_id
       };

       $.post(ajax_object.ajax_url, data, function(response) {
           console.log();
         if (self.hasClass('btn-primary')) {
             self.removeClass('btn-primary');
             self.addClass('btn-info');
             self['context']['innerHTML'] = 'Remove from favorites';
         }
         else
         {
             self.removeClass('btn-info');
             self.addClass('btn-primary');
             self['context']['innerHTML'] = 'Add to favorites';
         }

       })
   });
});