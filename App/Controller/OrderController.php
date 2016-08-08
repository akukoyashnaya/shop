<?php
namespace App\Controller;

class OrderController 
{
        public function showCheckout() 
        {   
             $cartproducts_idx = \App\Model\Cart::getDisplayableCart();
             $currency = \App\Model\Configuration::usedCurrency();
             $VAT = \App\Model\Configuration::getVAT();
             return \App\System\View::make('checkout', ['cart' => $cartproducts_idx,
                                                        'currency' => $currency,
                                                        'VAT'=> $VAT]);
        }
    
       public function setUserDetails()
        {
            foreach ($_POST as $key => $value)
            {
                $customer[$key] = $value;
            }
            $data = json_encode($customer);
            $_SESSION['customer'] = $data;
            return $data;
        }
        
        public function placeOrder(){
            //insert to order-items
            $VAT = \App\Model\Configuration::getVAT();
            $total = \App\System\Input::get('total');
          
            if (isset($_SESSION['customer'])) {
            $headerData=[
              'status'=>'1',
              'customer_details'=> $_SESSION['customer'],
              'total'=> $total
               ];
           $idx = \App\Model\Order::insertGetId($headerData);
         
           foreach ($_SESSION['cart'] as $key => $value){
               $id = intval($key);
               $name = \App\Model\Product::find($key)->name; 
               $currency = \App\Model\Configuration::usedCurrency();
               $price = \App\Model\Product::find($key)->price; 
               $data = [
                   'header_id' => $idx,
                   'product_id' => $key,
                   'product_name' => $name,
                   'product_price'=> $price + $price*$VAT,
                   'product_qty' => $value,
                   'currency'=>$currency
                   ];
               
                \App\Model\Detail::insert($data);
           }
                \App\System\Session::clear(); 
                 return 'ok';}
                 else return 'false';
            
        }
}