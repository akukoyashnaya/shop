<?php
include 'admin_header.php';
//dump($_SESSION);
?>

    <div id='container'>
   
    <form>
        <table id="admin-orders">
            <tr >
                <th >OrderID</th>
                <th>Customer</th>
                <th>From Date</th>
                 <th>Total</th>
                 <th>Status</th>
                
            </tr>
<?php                foreach($orders as $order): 
                //echo $order;
                
                ?>
                     
                     <tr id="row-<?=$order['id']?>" class="order-row"> 
     
      
      <td><?=$order['id']?></td>
      <td><?php echo $order['customer_details']['fname'].' '.$order['customer_details']['lname'];?></td>
      <td><?=$order['created_at']?></td>
      <td><?=$currency?><?=$order['total']?></td>
      <td><?=$order['status']?></td>
                 
       <?php endforeach; ?>       
     
                </table>
                </form>
                <div>
            </div>
            
        </div>
    
</body>
</html>