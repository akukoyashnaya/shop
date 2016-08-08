
<div class="right-area">
    <div class="table-content">
   
   <div><h1 class="table-header">Cart</h1></div>     
   <table id="cart-table">
  <?php 
  if (!empty($cart) and !$id) :
  foreach ($cart as $id=>$item): 
    if ($item['id']): ?>
    <tr>
        <td id="<?=$item['id']?>" class="name"><?=$item['name']?></td><td><?=$item['qty']?> X <?=$currency?><?php echo round(($item->price)+intval($item->price)*$VAT,0,PHP_ROUND_HALF_UP);?></td><td><a href="cart" class='delete-from-cart'><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
    </tr>
    
  <?php endif;
  endforeach;?>
    <tr>
        <td><span>Total</span></td><td><span><?=$currency?><?=$cart['total']?></span></td><td></td>
    </tr>
    <tr>
        <td><a href="/checkout"><span>Proceed to Checkout</span></td>
    </tr>
        <?php endif;
  
   if (empty($cart)):?>
    <tr>
        <td><span>Cart is empty!</span></td>
    </tr>
  <?php endif;?>
  
   </table>
   
    </div>    
</div>