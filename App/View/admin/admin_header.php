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
    <title>Document</title>
</head>
<body>
    <div id="admin-nav">
        <ul>
            <li><a href="/admin/items" id="to-products">Products</a></li>
            <li><a href="/admin/categories" id="to-categories">Categories</a></li>
            <li><a href="/admin/orders" id="to-orders">Orders</a></li>
            <li><a href="/admin/configuration" id="to-configuration">Configuration</a></li>    
        </div>
 