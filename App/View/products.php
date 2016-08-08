<?php
include 'header.php';
//dump($_SESSION);
?>

    <div id='container'>
     
    <div id="categories" class="center">
        
        <ul class="main-nav">
             
             <?php foreach($categories as $category):?>
                <li><a href="/products/<?=urlencode($category->category)?>" id="<?=$category->id?>" class="to-category" id="<?=$category->id?>"><?=$category->category?></li></a><span class="devider"> /</span>
            <?php endforeach;?>
            </ul>
        
    </div>
   
        <div id='content-area'>
        <div>
            <div class='left-area' >
                <div class="breadcrumbs"><?=$crumbs?></div>   
                <?php
                $i=0;
                foreach($products as $product): 
                //echo $product;
                if ($i % 3 == 0) { ?><div class="<?=$i?> section group"><?php }
                ?>
                     <div class="item col span_1_of_3">
                        <div class="label label-info price"><?=$currency?> <?php echo round(($product->price)+intval($product->price)*$VAT,0,PHP_ROUND_HALF_UP);?></div>
                        <div style="text-align:center"><a href=""><img src='<?=BASE_URL?>public/images/<?=$product->img_path?>' alt='<?=$product->id?>' style="width:100%; height:auto"></a></div>
                      
                        <div class="caption">
                            <div class="product-name"><?=$product->name?></div>
                            <a href="/" class="btn btn-primary add-to-cart" id="<?=$product->id?>">Add to Cart</a>
                            <?php
                           // dump($filtered); 
                            if ($filtered ==  true):?>
                            <a href="/products/<?=urlencode($category->category)?>/<?=$product->id?>"class="btn btn-default">Details</a>
                            <?php elseif ($filtered ==  null):?>
                              <a href="/products/homepage/<?=$product->id?>"class="btn btn-default">Details</a>
                            <?php endif;?>                            
                        </div>
                     </div>
                <?php
                if ((($i+1) % 3 == 0) || 
                    ($i>=count($products)-1)) { ?></div><!--/group <?=$i?>--><?php }

                $i++;
                endforeach;
                ?>
            </div>
            <div id="cart-container">
            <?php include 'cart.php';?>
            </div>
        </div>
    </div>
</body>
</html>