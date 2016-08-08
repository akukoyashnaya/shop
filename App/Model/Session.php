<?php
namespace App\Model;

class Session extends \App\System\Session
{
     public static function toCart($id, $qty)
    {
        if (!isset($_SESSION['cart'])) 
            {
               $_SESSION['cart']=array();
           
              
            }
            
        if (!array_key_exists($id,$_SESSION['cart']))
            {
               $_SESSION['cart'][$id]=intval($qty);
              // var_dump($_SESSION['cart']);
            ///  dump('bbb');
            }
        else //(array_key_exists($id,$_SESSION['cart']))
            {$_SESSION['cart'][$id]+=intval($qty);
          //  dump('ccc');    
            }
     // dump($_SESSION['cart']);
      return  $_SESSION['cart'];//\App\System\Session::get('cart');      
        
        }
        
        public static function deleteFromCart($id){
               $x=isset($_SESSION['cart'][$id]);
               if ($x){
             unset ($_SESSION['cart'][$id]);
             
         }
            //  dump($_SESSION['cart']);
           return  $_SESSION['cart'];  
        }
        
        public static function rewriteCart($id, $qty) {
            if (array_key_exists($id,$_SESSION['cart']))
            {
               $_SESSION['cart'][$id]=$qty;
               return  $_SESSION['cart'];
            } 
            
        }
}