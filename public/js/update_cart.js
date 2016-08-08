$(document).ready(function(){
    var add_msg = "Item added to Cart";
    var del_msg = "Item deleted from Cart";
    $(document).on('click','.add-to-cart', function(e){
        e.preventDefault();
        var prod_id = $(this).attr("id");
        var qty = 1;
        var flag = 1; //1 - add, 0 - delete
           $.post('/cart', {'id':prod_id, 'qty':qty, 'flag': flag}, function(res){
           $('#cart-container').html(res);
           $.notify(add_msg, "success");
         });
      });
     
      $(document).on('click','.add-to-checkout', function(e){
        e.preventDefault();
        var prod_id = $(this).attr("id");
        var qty = 1;
        var flag = 1; //1 - add, 0 - delete
           $.post('/cart', {'id':prod_id, 'qty':qty, 'flag': flag}, function(res){
           //$('#cart-container').html(res);
         window.location.href = "/checkout";
              $.notify(add_msg, "success");
             
         });
      });
     
     $(document).on('click','.delete-from-cart', function(e){
        e.preventDefault();
        var prod_id = $(this).parent().parent().find('td:first-child').attr('id');
        var flag = 0; //1 - add, 0 - delete
        $.post('/cart', {'id': prod_id, 'flag': flag}, function(rest){
             $('#cart-container').html(rest);
               $.notify(del_msg, "info");
          });
      });
      
        $(document).on('click','.delete-from-checkout', function(e){
        e.preventDefault();
        var prod_id = $(this).attr('id');
        var flag = 3; // 3 - delete from checkout
        $.post('/cart', {'id': prod_id, 'flag': flag}, function(res){
            var res = JSON.parse(res);
            var id = '#'+res.id;
            $(id).parent().parent().hide();
            $('#total').text(res.total);
            $.notify(del_msg, "info");
            
        });
      });
     
        $(".overview").focus(function() {
        $(this).next().show();
          });
      
        $(".apply").click(function() {
            var x = ($(this).val());
            var y = '.x-'+x;
            var z = $(this);
            
            y = $(y).val();
            
            console.log(x);
            console.log(y);
            console.log(z);
        $.post('/cart',{'id':x, 'qty':y, 'flag':2}, function (msg){
            var res = jQuery.parseJSON(msg);
            console.log(res);
            $('#total').text(res.total);

            //console.log(res.qty);
            if (res.qty == '0') 
            {
            var selector = 'a#'+res.id;
            //console.log(selector);
            $(selector).parent().parent().hide();
            }
            var price = z.closest('tr').find('.item-price').text();
            var subtotal = price*res.qty;
            z.closest('tr').find('.subtotal').text(subtotal);
          // console.log(price);
            $(".apply").hide();
            
              $.notify("Item quantity changed", "info");
        });
      });
      
});