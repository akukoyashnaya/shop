<?php
include 'admin_header.php';
//dump($_SESSION);
?>


    <div id='container'>
  
    <div class="ibox-content">   
    <div class=""><!--instruments-->
         <div class="section group  form-group ">
            <div class="col-1 span_4_of_4 customer-header">
            <h4>Order Details</h4>
            </div> 
        </div>
        <div class="section group">
            <div class="col span_1_of_4 form-group">
                <label for="id" >Order ID</label>
                <input type="text" name="id" value = "<?=$order->id?>" >
            </div>
            <div class="col span_1_of_4 form-group">
                <label for="date" >From Date</label><br>
                <input type="datetime" name="date-from" value = "<?=$order->created_at?>" >    
            </div>
            <div class="col span_1_of_4 form-group">
                <label for="status" >Status</label><br>
                <input type="text" name="status" value = "<?=$order->status?>" >    
            </div>
            <div class="col span_1_of_4 form-group">
                <label for="total" >Total</label><br>
                <input type="text" name="total" value = "<?=$currency?><?=$order->total?>" >    
            </div>
       </div>
        <div class="section group  form-group ">
            <div class="col-1 span_4_of_4 customer-header">
            <h4>Customer Details</h4>
            </div> 
        </div>
        <div class="section group  form-group">
            <div class="col span_1_of_4">
                <label for="name" >Name</label>
                <input type="text" name="name" value = "<?=$customer->fname?> <?=$customer->lname?> " >
            </div>
            <div class="col span_1_of_4  form-group">
                <label for="email" >Email</label><br>
                <input type="email" name="email" value = "<?=$customer->email?>" >    
            </div>
            <div class="col span_1_of_4  form-group">
                <label for="phone" >Phone</label><br>
                <input type="text" name="phone" value = "<?=$customer->phone?>" >    
            </div>
            <div class="col span_1_of_4">
                <label for="address" >Address</label>
                <input type="text" name="address" value = "<?=$customer->zip?>, <?=$customer->country?>, <?=$customer->address?>" >
            </div>
           
       
        </div>
        </div>
    </div>
    <form id="order-form">
        <table id="admin-items">
            <tr >
                <th >Product ID</th>
                <th>Name</th>
                 <th>Quantity</th>
                 <th>Price</th>
             
            </tr>
<?php                foreach($details as $detail): 
                //echo $detail;
                
                ?>
                
                     <tr> 
     
      <td><?=$detail->product_id?></td>
      <td><?=$detail->product_name?></td>
       <td><?=$detail->product_qty?></td>
      <td><?=$currency?><?=$detail->product_price?></td>
       
     
     </tr>           
         <?php endforeach; ?>       
     
                </table>
                </form>
                <div>
            </div>
            
        </div>
    
</body>
</html>