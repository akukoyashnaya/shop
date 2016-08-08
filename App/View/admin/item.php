<?php
include 'admin_header.php';
//dump($_SESSION);
?>
    <div id="container">
        <form 
        <?php if(is_null($item->id) or $item->id=='0' ): ?>     action="/admin/item/new" 
        <?php else:  ?>                       action="/admin/item/<?=$item->id?>" 
        <?php endif;?>
        method="post" enctype="multipart/form-data" id="product-form">
            <div class="section group">
             <div class = "col span_1_of_2 ">
                 <h3>
                 <?php if($item->id == 'new' or is_null($item->id)):?>
                 <a href="/admin/items">Products</a><span> > New Product</span> 
                 <?php else: ?>
                 <a href="/admin/items">Products</a><span> > Product #<?=$item->id?></span> 
                   <?php endif; ?>
                 </h3>
               
                <?php  if($item->id == 'new' or is_null($item->id)){?>
                <input type="file" name="fileToUpload" id="fileToUpload" required>
                  <img id="blah" src="#" alt="Choose file for preview" style="width:100% height:auto"/><span class="required">*</span>
                   <span class="error"><?=$imageErr;?></span>
               
                <?php }  else {?>
                   <input type="file" name="fileToUpload" id="fileToUpload" required>
                 <img id ="blah" src="<?=BASE_URL?>public/images/<?=$item->img_path?>" alt='<?=$item->id?>' style="width:100%; height:auto">    
                <?php } ?>
            </div>
             <div  class="col span_1_of_2 form-group item">
            <input type = "hidden" name="id" value = "<?=$item->id?>" >
            <label for="name" >Name</label><span class="required">*</span> <span id="error_name" class="error"><?=$error['name'];?></span>
            <input type="text" name="name" class = "item" value = "<?=$item->name?>" >
            
            <div class="section group">
                  <div  class="col span_1_of_2 form-group">
                    <label for="price"> Price (w/o) VAT tax</label><span class="required">*</span><span id="error_price" class="error"><?=$error['price'];?></span>
                    <input type="text" name="price" value = "<?=$item->price?>" class = "item">
                     <span class="error"><?=$priceErr;?></span>
                </div>
                
                 <div  class="col span_1_of_2 form-group">
                    <label class="left">Category</label><span class="required">*</span><span id="error_category" class="error"><?=$error['category'];?></span>
                <select name="category" class = "item">
                    <option value="0">All Categories</option>
                     <?php
                       foreach ($categories as $category) {
                             if ($category->id == $item->category_id){
                      ?>
                            <option value="<?=$category->id?>" selected> <?=$category->category?> </option>
                       <?php }
                               else {
                        ?>
                            <option value="<?=$category->id?>"><?=$category->category?></option>
                      <?php   }}?>  
                </select>
                 <span id="error_category" class="error"><?=$categoryErr;?></span> 
                </div>
               
            </div>
            
            <label>Description</label><span class="required">*</span><span id="error_description" class="error"><?=$error['description'];?></span>
            <textarea name="editor1" id="editor1" rows="10" cols="80"><?=$item->description?></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>

                
                  <input type="submit" name="action" value="Submit" class="submit-btn btn">
                
                
                  <?php  if( $item->id != 'new'):?>
                  <input type="submit" name="action" value="Delete" class="delete-btn btn" id="<?=$item->id?>">
                  <?php endif;?>
            </div>
       
    </div>
        </form> 
    </div>
			</body>
			</html>