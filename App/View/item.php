<?php
include 'header.php'
?>
    <div id='container'>
       
        <div id='content-area'>
            <div class='left-area' >
              
    <div class="section group" >
   
    
    <div class="col span_1_of_2 ">
    
        <div class="breadcrumbs"><?=$crumbs?></div>
       
        <div><img src='<?=BASE_URL?>public/images/<?=$item->img_path?>' alt='<?=$item->id?>' style="width:100%; height:auto" ></div>
        
    </div>    
     <div class="col span_1_of_2">
        <div class="item-title"><?=$item->name?></div>
          <div class="item-id">#<?=$item->id?></div>
        <div><p><?=$item->description?></p></div>
        <div class="item-price"><p>Price: <?=$currency?><?php echo round(($item->price)+intval($item->price)*$VAT,0,PHP_ROUND_HALF_UP);?><p></div>
       <div>
            <a href="" class="btn btn-primary add-to-cart" id="<?=$item->id?>">Add to Cart</a>
             <a href="" class="btn btn-primary add-to-checkout" id="<?=$item->id?>">Add to Cart and procceed to Checkout</a>
              <a href="/products" class="btn btn-primary " id="<?=$item->id?>">Back</a>
       </div>
     </div>
             
            </div>
             
            </div>
             <div id="cart-container">
            <?php include 'cart.php';?>
            </div>
    </div>
</body>
</html>