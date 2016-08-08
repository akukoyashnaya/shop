$(document).ready(function(){
    $('.to-details').on('click', function(e){
    
    $( "#tabs" ).tabs( "enable", 1 );   
    $('#tabs').tabs({active: 1});
    $( "#tabs" ).tabs( "disable", 0 );
    
});

     $('#order-user-details').submit(function(e){
     e.preventDefault();
    var userdata = $( this ).serialize();  
   
    $.post('order', userdata, function (msg){
            $( ".stop" ).find('table').remove();
            $( "table.order-items-table" ).clone().prependTo( ".stop" ).addClass('newSummary');
            $(".newSummary .delete-from-checkout").remove();
            $(".newSummary img").remove();
            $(".newSummary input").replaceWith((function(){
                return '<span >'+this.value+'</span>'
            }))
           
            $( "#tabs" ).tabs( "enable", 2 );  
            $('#tabs').tabs({active: 2}); 
             $( "#tabs" ).tabs("option", "disabled", [0,1] );
           
            var customer = JSON.parse(msg);
           
          
            $('.customer').text(customer.fname).append(' ').append(customer.lname); 
            $('.phone').text(customer.phone);
            $('.email').text(customer.email);
            $('.address').text(customer.country).append(', ')
                         .append(customer.zip).append(', ')
                         .append(customer.address);
        });
    });
    
    $('.place-order').on('click', function(ev){
        ev.preventDefault();
        var total=$('#total').text();
       
        $.post('/order/confirm',{total:total}, function(msg){
           
            $("#tabs-3").html('<h3>'+'Your order has been placed!'+'</h3>'+'<br/>'+'Go to '+'<a href="/">Homapage</a>');
        })
    })
    
      $('form#order-user-details').on('click', '.back-to-items',function(e){
       e.preventDefault();
       $('#tabs').tabs("enable",0);
       $('#tabs').tabs({active: 0});
       $('#tabs').tabs("option", "disabled", [ 1, 2] );
    });
    
       $('.back-to-details').on('click', function(e){
         e.preventDefault();
           $('#tabs').tabs("enable",1);
      $('#tabs').tabs({active: 1});
       $('#tabs').tabs("option", "disabled", [ 0, 2] );
});
      
      $('#ui-id-2').on('click', function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
      })
      
      
       
    });
    
  