<?php
namespace App\Model;
//order details
class Configuration extends \Illuminate\Database\Eloquent\Model
{
     // public $id;
      protected $primaryKey ='id';
      protected $fillable = ['parameter', 'value'];
      public $timestamps = false;
      
       //get Currency
      public function usedCurrency (){
         $currency = \App\Model\Configuration::where('parameter','=','currency')->first();
         $currency = $currency->value;
         
         if ($currency=="usd"){
          return 	'&#36;';
         }
          elseif ($currency=="euro"){
          return 	'&#8364;';
         }
          elseif ($currency=="shekel"){
          return 	'&#8362;';
         }
    }
    
     public function getVAT(){
       $VAT = \App\Model\Configuration::where('parameter','=','VAT')->first();
       $VAT = $VAT->value;
       return $VAT*0.01;
       
     }
}
