<?php
include 'header.php';
//dump($cart);

?>
<!doctype html>
  <script>
  $(document).ready(function() {
    $( "#tabs" ).tabs({
  disabled: [ 1, 2 ]
});
  });
  </script>
</head>
<body>

<div id="container"> 
<?php if (isset($_SESSION['cart'])):?>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Step 1: Order Details</a></li>
    <li><a href="#tabs-2">Step 2: Customer Info</a></li>
    <li><a href="#tabs-3">Step 3: Summmary & Confirmation</a></li>
  </ul>
  <div id="tabs-1">
    <table style="width:100%" class="order-items-table">
        <tr>
            <th></th>
            <th class="left">Item</th>
            <th class="left">Quantity</th>
            <th class="left">Price</th>
            <th class="left">Total per Item</th>
             
        </tr>
        <?php$x=0;?>
        <?php foreach ($cart as $item): ?>
        <tr>    
            <?php if ($item->id):?> 
            <td><img src='<?=BASE_URL?>public/images/<?=$item->img_path?>' alt='<?=$item->id?>' style="width:150px; height:130px"></td>
            <td><?=$item->name ?></td>
            <td>
                <input type="text"  class="overview x-<?=$item->id?>" name="qty" value="<?=$item->qty?>" >
                <button class="apply btn-primary btn" style="display:none" value="<?=$item->id?>" > Apply </button>
            </td>
            <td><?=$currency?><span class="item-price"><?php echo round(($item->price)+intval($item->price)*$VAT,0,PHP_ROUND_HALF_UP);?></span></td>
            <td><?=$currency?><span class="subtotal"><?=$item->subtotal?></span></td>
            <td><a href="cart" class='delete-from-checkout' id="<?=$item->id?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            <?php endif;?>
        </tr>
        <?php endforeach?>
        <tr><td></td><td class="total-row"><span class="total-header">Total: </span><td></td><td><?=$currency?><span id="total"><?=$cart['total']?></span></td></tr>
        
        </table>
        <div>
          <btn class="btn btn-primary to-details ">Next</btn>
        </div>
        <div class="clear">
          </div>

  </div>
  <div id="tabs-2">
     <form action ="order" method="post" id="order-user-details">
      <div class="section group">
        <div class="col-checkout span_2_of_3">
          <h2 class="checkout-header">Personal Info</h2>
        </div>
      </div>
      <div class="section group">
        <div class="col-checkout span_1_of_3">
        <label><span>First Name</span></label>
        <input type="text" name="fname" required value="">
        </div>
        <div class="col-checkout span_1_of_3">
        <label><span>Last Name</span></label>
        <input type="text" name="lname" required>
        </div>
      </div>
      <div class="section group">
      <div class = "col-checkout span_1_of_3">
      <label><span>Email</span></label>
      <input type="email" name="email" required>
      </div>
      <div class = "col-checkout span_1_of_3">
       <label><span>Phone</span></label>
      <input type="text" name="phone" required>
      </div>
      </div>
      <div class="section group">
        <div class = "col-checkout span_2_of_3">
        <h2 class="checkout-header">Shipping Info</h2>
        </div>
        </div>
      <div class="section group">
        <div class = "col-checkout span_1_of_3">
        <label><span>Country</span></label>
        <select name="country" id="country">
                      <option>Australia</option>
                      <option>Belgium</option>
                      <option>Germany</option>
                      <option>United Kingdom</option>
                      <option>Switzerland</option>
                      <option>USA</option>
                    </select>
        </div>
        <div class = "col-checkout span_1_of_3">
           <label><span>Zip Code</span></label>
      <input type="text" name="zip" required>
        </div>
      </div>
      <div class="section group">
      <div class = "col-checkout span_2_of_3">
      <label><span>Address</span></label>
      <input type="text" name="address" required>
      </div>
      </div>
       <div>
          <input type="submit" class="btn btn-primary to-confirm" value="Next">
              <a href="" class="btn btn-primary back-to-items" value="Next">Back</a>
        </div>
    </form>
   
        <div class="clear"></div>
    </div>
  <div id="tabs-3">
    <div class="section group">
      <div class="col span_1_of_2">
        <h3>Your order is:</h3>
        
       
        <div class = "stop">
          
        </div>
    </div>
      <div class="col span_1_of_2 customer-details">
         <h3>Customer Info:</h3>
         <ul>
           <li>Customer: <span class="customer"></span></li>
           <li>Email:<span class="email"></span></li>
           <li>Phone:<span class="phone"></span></li>
           <li>Address:<span class="address"></span></li>
           </ul>
        </div>
        
   
    </div>
    <div>
      <a href="" class="btn btn-primary place-order">Place Order</a>
       <a href="" class="btn btn-primary back-to-details" value="Next">Back</a>  
    </div>
    <div class="clear"></div>
  </div>
</div>

<?php
else:
  header('Location:/products');
endif;?>
 </div>
 
</body>
</html>