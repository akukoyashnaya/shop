<?php
namespace App\Controller;

use App\Model\User;
use App\System\Input;

class CartController 
{
     //show Cart
     public function show()
    {
     $cart = App\System\Session::get('cart');
     $currency = \App\Model\Configuration::usedCurrency();
     $VAT = \App\Model\Configuration::getVAT();
     return ['cart' => $cart, 'currency' => $currency, 'VAT' => $VAT];
        
    }
    
    //update Cart - all options from /products, /item, /checkout
    public function update()
    {
     
     $id = \App\System\Input::get('id');
     $qty=\App\System\Input::get('qty');
     $flag = \App\System\Input::get('flag');
     
       if ($flag ==1 ) { //add item from cart
         \App\Model\Session::toCart($id,$qty);
         $cart = \App\Model\Cart::getDisplayableCart();
         $currency = \App\Model\Configuration::usedCurrency();
         $VAT = \App\Model\Configuration::getVAT();
         return \App\System\View::make('cart', ['cart' => $cart,'currency' => $currency,'VAT' => $VAT]);
     }
       if ($flag == 0 ) { //delete item from cart
          \App\Model\Session::deleteFromCart($id);
         $cart = \App\Model\Cart::getDisplayableCart();
         $currency = \App\Model\Configuration::usedCurrency();
         $VAT = \App\Model\Configuration::getVAT();
         return \App\System\View::make('cart', ['cart' => $cart,'currency' => $currency,'VAT' => $VAT]);
     }
       if ($flag == 2 ) { //update quantity in checkout
          \App\Model\Session::rewriteCart($id,$qty);
                  if ($qty == "0") {
          \App\Model\Session::deleteFromCart($id);
         }
         // dump($_SESSION['cart']);
          $cart = \App\Model\Cart::getDisplayableCart();
         
         // dump($cart);
          $res = [
           'total' => $cart['total'],
           'id' => $id,
            'qty' => $qty
           ];
          return json_encode($res); 
     }
       if ($flag == 3 ) { //add item from checkout
          \App\Model\Session::deleteFromCart($id);
          $cart = \App\Model\Cart::getDisplayableCart();
          $data['id'] = $id;
          $data['total'] = $cart['total'];
          $data = json_encode($data);
          return $data;
      }
    }
    
    
}