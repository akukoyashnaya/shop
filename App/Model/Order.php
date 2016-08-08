<?php
namespace App\Model;

class Order extends \Illuminate\Database\Eloquent\Model
{
     // public $id;
      protected $primaryKey ='id';
      protected $fillable = ['status', 'customer_details, total'];
       //public $timestamps = false;
}