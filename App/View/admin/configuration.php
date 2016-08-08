<?php
include 'admin_header.php';
//dump($_SESSION);
?>
 <div id='container'>
    <?php if($admin):?>   
    <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
</head>
<body>
 
<div id="accordion">
  <h3>Taxes: VAT</h3>
  <div>
    <span>(*)Value in percents</span>
    <form method="admin/configuration" action="post" id="VAT-form">
      
      <input type="text" value = "<?=$VAT->value?>" name="VAT">
      <input type = "submit" value="Submit" class="btn" id="VAT">
      
      </form>
      
  </div>
  <h3>Currencies</h3>
  <div>
     <form method="" action="post" id="currencies-form">
      
      
      <input type="radio" name="currency" value="1"<?=$currency['0']?> > euro<br>
      <input type="radio" name="currency" value="2" <?=$currency['1']?>> usd<br>
      <input type="radio" name="currency" value="3" <?=$currency['2']?>> shekel<br>
      <input type = "submit" value="Submin" class="btn" id="currency">
      
      </form>
  </div>
  <h3>Order Statuses</h3>
  <div>
    
    <ul class="status">
      <?php foreach($orderStatuses as $par=>$value):?>
      <li> <?=$par?> - <?=$value?></li>
      <?php endforeach;?>
    </ul>
  </div>
  
</div>
            
        </div>
         <?php
    else: header('Location:/admin/login');
    endif;
    
    ?> 
    </div>
</body>
</html>