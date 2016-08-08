<?php
include 'admin_header.php';
//dump($_SESSION);
?>

    <div id='container'>
    <?php if($admin):?>   
    <div class="ibox-content">   
    <div class=""><!--instruments-->
        <div class="section group">
       <div class="col span_1_of_3">
        <select  id="categories-list">
            <option value="0">All Categories</option>    
            <?php foreach($categories as $category):?>
            <option value="<?=$category->id?>"><?=$category->category?></option>    
            <?php endforeach;?>
        </select>
        </div>
        <div class="col span_1_of_3">
            
        </div>
        <div class="col span_1_of_3 right">
           <a href="/admin/item/new">Add New Product</a> 
        </div>
        </div>
        </div>
    </div>
    <form>
        <table id="admin-items">
            <tr >
                <th >ItemID</th>
                <th>Name</th>
                 <th>Price</th>
                <th class="center"><a href="#" class="delete-items">Delete</a></th>
            </tr>
    <?php  foreach($products as $product):?>                
          <tr id="row-<?=$product['id']?>" class="product-row"> 
              <td><?=$product['id']?></td>
              <td><a href='/admin/item/<?=$product['id']?>'><?=$product['name']?></a></td>
              <td><span><?=$currency?></span><?=$product['price']?></td>
                      
                       <td class="center ajax">  <input type="checkbox"  name="items-to-delete[]" id="items-to-delete" value="<?=$product['id']?>"> </td>
                 
     
         </tr>           
         <?php endforeach; ?>       
     
                </table>
                </form>
                <div>
            </div>
    <?php
    else: header('Location:/admin/login');
    endif;
    
    ?> 
    
        </div>
    
</body>
</html>