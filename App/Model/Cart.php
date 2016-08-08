<?php
namespace App\Model;

class Cart extends \Illuminate\Database\Eloquent\Model
{
    public function getDisplayableCart() {
    $VAT = \App\Model\Configuration::getVAT();
    $cartproducts_idx['total']=0;
    if (isset($_SESSION['cart'])){
       $ids = array_keys($_SESSION['cart']); 
     $cartproducts = \App\Model\Product::whereIn('id',$ids)->get(); 
     $cartproducts_idx=[];
     foreach ($cartproducts as $cartproduct)
     {
       $cartproducts_idx[$cartproduct['id']]=$cartproduct;
     }
     foreach ($_SESSION['cart'] as $id=>$qty){
     $cartproducts_idx[$id]['qty']=intval($qty);
     $cartproducts_idx[$id]['subtotal']=$cartproducts_idx[$id]['qty']*round(($cartproducts_idx[$id]['price']+$cartproducts_idx[$id]['price']*$VAT),0,PHP_ROUND_HALF_UP);
     $cartproducts_idx['total']+=$cartproducts_idx[$id]['qty']*round(($cartproducts_idx[$id]['price']+$cartproducts_idx[$id]['price']*$VAT),0,PHP_ROUND_HALF_UP);
      
     }
     
     return $cartproducts_idx;
    }
     else 
      return false;
     
    } 
    
        
}