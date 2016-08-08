<?php
namespace App\Model;

class Product extends \Illuminate\Database\Eloquent\Model
{
     // public $id;
      protected $primaryKey ='id';
      protected $fillable = ['name', 'price', 'description', 'category_id', 'img_path','in_listing', 'homepage'];
       public $timestamps = false;
}