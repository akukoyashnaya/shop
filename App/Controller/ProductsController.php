<?php
namespace App\Controller;

class ProductsController 
{
    //homepage
    public function index()
    {
     $products = \App\Model\Product::all();
     $cartproducts_idx = \App\Model\Cart::getDisplayableCart();
     $categories = \App\Model\Category::all();
     $crumbs = NavigationController::Breadcrumbs();
     $filtered = false;
     $currency = \App\Model\Configuration::usedCurrency();
     $VAT = \App\Model\Configuration::getVAT();
          return \App\System\View::make('products', ['products' => $products,
                                                'cart'=>$cartproducts_idx, 
                                                'categories' => $categories, 
                                                'crumbs'=>$crumbs, 
                                                'filtered' => $filtered, 
                                                'currency' =>$currency,
                                                'VAT'=>$VAT]);
    }
   //show category 
   public function filter()
   {
    $activeCategory = \App\System\Input::get('category');
    $activeCategory = urldecode($activeCategory);
    $category_id = \App\Model\Category::where('category','=',$activeCategory)->first(['id']); 
    $category_id = $category_id->id;
    $products = \App\Model\Product::where('category_id','=',$category_id)->get();
    $cartproducts_idx = \App\Model\Cart::getDisplayableCart();
    $crumbs = NavigationController::Breadcrumbs();
    $categories = \App\Model\Category::all();
    $filtered = true;
    $currency = \App\Model\Configuration::usedCurrency();
    $VAT = \App\Model\Configuration::getVAT();
    return \App\System\View::make('products', ['products' => $products,
                                               'cart'=>$cartproducts_idx,
                                               'categories' => $categories, 
                                               'filtered' => $filtered,
                                               'crumbs' =>$crumbs,
                                               'currency' =>$currency,
                                               'VAT' => $VAT]);
   }
   
   //show item
    public function show()
    {
     $id = \App\System\Input::get('id');
     $item = \App\Model\Product::find($id);
     $cartproducts_idx = \App\Model\Cart::getDisplayableCart();
     $crumbs = NavigationController::Breadcrumbs();
     $backPath = NavigationController::getBackPath($crumbs);//doesn't work :-(
     $currency = \App\Model\Configuration::usedCurrency();
     $VAT = \App\Model\Configuration::getVAT();
       if(!$item) {
        return '404';
     }
     return \App\System\View::make('item',['item' => $item,
                                           'cart'=>$cartproducts_idx, 
                                           'crumbs'=>$crumbs, 
                                           'backpath'=>$backPath,
                                           'currency' =>$currency,
                                           'VAT' =>$VAT]);
   
    }
  }