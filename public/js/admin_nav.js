$(document).ready(function(){
 //menu navigation
 var pathname = window.location.pathname;

	
	$('#admin-nav ul li > a[href="'+pathname+'"]').parent().addClass('nav-active');
 
 ///
  $('#product-form .submit-btn').on('click',function(e) {
    
      e.preventDefault();
      $('#editor1').val(CKEDITOR.instances.editor1.document.getBody().getHtml());
      var formdata = $( '#product-form' ).serialize();
      var submurl = "/admin/item/validate"; //$(ev.target).attr( 'action' );
      
      $.ajax( {
          type: "POST",
          url: submurl,
          data: formdata+'&validate=1',
          success: function( response ) {
          
             var resp = JSON.parse(response);
             $('.error').text('');
             if (!resp.ok) {
                 for (var ek in resp.errors)
                 {
                     $('#error_'+ek).text(resp.errors[ek]);
                 }
             }
             else
             {
               
               $('#product-form').submit();
             }
                  }
    } );

  });
  
    $('#product-form .update-btn').on('click',function(e) {
      e.preventDefault();
      $('#editor1').val(CKEDITOR.instances.editor1.document.getBody().getHtml());  
      var formdata = $( '#product-form' ).serialize();
      
      var submurl = "/admin/item/validate"; //$(ev.target).attr( 'action' );
      //("submitting to "+submurl);
      var id = $(this).attr('id');
      var update_url = '/admin/items/'+id;
     
      
      $.ajax( {
          type: "POST",
          url: submurl,
          data: formdata+'&validate=1',
          success: function( response ) {
              var resp = JSON.parse(response);
         
             $('.error').text('');
             if (!resp.ok) {
                 for (var ek in resp.errors)
                 {
                     $('#error_'+ek).text(resp.errors[ek]);
                 }
                 
                   
             }
             else
             {
                 
               $('#product-form').submit(function(ev){
                   ev.preventDefault();
                            
                   $.post(update_url, function(callback){
                       
                   })
               });
             }
             
      }
    } );

  });

    $('#categories-list').change(function() {
        var data = {"category":$('#categories-list option:selected').val()};
        var category = $("#categories-list option:selected").text();
        url = '/admin/items/category';
      
        $.get(url, data, function(callback){
           //$(document).html(callback); 
           $('html').html(callback);
        });
    });
    
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#fileToUpload").change(function(){
        readURL(this);
    });
  
    $('#product-form .delete-btn').on('click',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
      
        var url = "/admin/item/delete";
        $.post(url, {id: id, flag:'1'}, function(){
        window.location.href='/admin/items';  
       
        })
    })
    
       var myCheckboxes = new Array();
      
     $(".delete-items").click(function(e){
     e.preventDefault(); 
     $(".ajax input:checked").each(function() {
           myCheckboxes.push($(this).val());
       });
       
       var url = '/admin/item/delete'; 
     $.post(url, {id:myCheckboxes, flag:'2'}, function(callback){
     //
     
      callback=jQuery.parseJSON(callback);
       
       var arr = jQuery.makeArray(callback); 
      var length=arr.length;
     
      for (var i=0; i<length; i++){
        $('tr#row-'+callback[i]).remove(); 
        }
    });  
    
    });
    
   
    $("#admin-orders").on('click','tr', function(){
        var x = $(this).attr('id');
        var id = x.replace('row-','');
        var url = '/admin/order/'+id;
        window.location.href = url;
    })
    

    $('form#login').submit(function(e)    {
         e.preventDefault();
         var x = $( this ).serialize();
         $.post('/admin/login', x, function (msg){
             if(msg == 1) {
                 window.location.href = '/admin/orders';
             }
             else { 
                
                 $('.errors').text('Wrong username or password.');
             }
         });
    
        
    });
    
    $('in-listing-group').on('click', function(e){
        e.preventDefault();
       $('#onsite:checked').each(function() {
           myCheckboxes.push($(this).val());
       });
      
    })

   $("#VAT-form").submit(function(e){
       e.preventDefault();
       var param = $( this ).serialize();
       var url = '/admin/configuration/vat';
       $.post(url, param, function(msg){
          
       })
   })
   
   $("#currencies-form").submit(function(e){
       e.preventDefault();
       var param = $( this ).serialize();
       var url = '/admin/configuration/currency';
       $.post(url, param, function(msg){
         
       })
   })
    
})