<?php
namespace App\Model;
//order details
class Detail extends \Illuminate\Database\Eloquent\Model
{
     // public $id;
      protected $primaryKey ='id';
      protected $fillable = ['header_id', 'product_id', 'product_name', 'price'];
      public $timestamps = false;
}

