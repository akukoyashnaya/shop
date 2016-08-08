<?php
use App\System\Router;

Router::get('/', 'ProductsController@index');
Router::get('products/homepage', 'ProductsController@index');


Router::get('about', function() {
    return App\System\View::make('about');
});

Router::get('contact_us', function() {
    return App\System\View::make('contact_us');
}); // show contact us page

Router::get('products', 'ProductsController@index'); // Show all posts
Router::get('products/{category}', 'ProductsController@filter');
Router::get('products/{category}/{id}','ProductsController@show');
//Router::get('product/{id}', 'ProductsController@show'); 
Router::post('cart', 'CartController@update'); 

Router::post('product/cart', 'CartController@update');
Router::get('checkout', 'OrderController@showCheckout');
Router::get('product/checkout', 'OrderController@showCheckout');
Router::post('order', 'OrderController@setUserDetails');
Router::post('order/confirm', 'OrderController@placeOrder');



Router::post('contact_us', ''); // submit from contact us page

Router::get('admin', function() {
    return App\System\View::make('admin/login'); 
});
Router::get('admin/login', function() {
    return App\System\View::make('admin/login'); 
});
Router::post('admin/login', 'AdminController@verify');

Router::get('admin/items', 'AdminController@showProducts'); 
Router::get('admin/categories', 'AdminController@showCategories');
Router::get('admin/items/category', 'AdminController@showFilteredProducts'); 
Router::get('admin/item/{id}', 'AdminController@showItem'); 
Router::post('admin/item/{id}', 'AdminController@updateItem'); 
Router::post('admin/item/validate','AdminController@formValidation');
Router::post('admin/item/delete','AdminController@deleteItem');
Router::post('admin/item/new', 'AdminController@getItemFromAdmin');
Router::get('admin/item/new', 'AdminController@showEmptyForm');
Router::post('admin/item/onsite-update','AdminController@onsiteUpdate');
Router::get('admin/orders', 'AdminController@showOrders'); 
Router::get('admin/order/{id}', 'AdminController@showOrderItem'); 
Router::get('admin/configuration', 'AdminController@showConfig'); 
Router::post('admin/configuration/vat', 'AdminController@updateVAT'); 
Router::post('admin/configuration/currency', 'AdminController@updateCurrency'); 


