<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>Document</title>
    <script src="<?=BASE_URL?>public/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href='<?=BASE_URL?>public/css/admin.css'>
    <link rel="stylesheet" type="text/css" href='<?=BASE_URL?>public/css/grid.css'>
  
    <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
    <script src="https://use.fontawesome.com/840243f33a.js"></script>
    <script src="<?= BASE_URL ?>public/js/jquery.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>public/jsui/jquery-ui.min.css">
    <script src="<?= BASE_URL ?>public/jsui/jquery-ui.min.js"></script>
    <script src="<?= BASE_URL ?>public/js/update_cart.js"></script>
    <script src="<?= BASE_URL ?>public/js/checkout_nav.js"></script>
    <script src="<?= BASE_URL ?>public/js/admin_nav.js"></script>
    <script src="<?= BASE_URL ?>public/js/categories.js"></script>
    <meta charset="UTF-8">
    
</head>
<body>
    <div id="container">
        <div id=login-wrapper>
        <h4>Login to Shop Administration <h4>
        <div>
        <img src="<?= BASE_URL ?>public/images/tea_logo.png" width="120px" height="120px" class="admin-logo">
        </div>
    <form action="" method="post" id="login" class="center">
        <input type="text" name="username" class="login" placeholder="login">
        <input type="password" name="password" class="password" placeholder="password">
        <input type="submit" value='Login' class="btn center">
       
    </form>
   
        <div class="errors"></div>
       
            </div>
    </div>
</body>
</html>