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
      
        </div>
        <div class="col span_1_of_3">
            
        </div>
        <div class="col span_1_of_3 right">
            
        </div>
        </div>
        </div>
    </div>
    <div class="section group">
        <div class="col span_1_of_2">
    <form>
        <table id="admin-categories">
            <tr >
                <th >CategoryID</th>
                <th>Name</th>
                
              
            </tr>
<?php                foreach($categories as $category): 
                //echo $product;
                
                ?>
                     
                     <tr > 
     
      
      <td><?=$category['id']?></td>
      <td><input type="text" name="price" value="<?=$category['category']?>" size="10" readonly></td>
      
   
     
     
     </tr>           
         <?php endforeach; ?>       
     
                </table>
                </form>
                </div>
                </div>
                <div>
            </div>
            
        </div>
         <?php
    else: header('Location:/admin/login');
    endif;
    
    ?> 
    </div>
</body>
</html>