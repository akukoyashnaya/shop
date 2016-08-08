<?php
namespace App\Controller;

class AdminController{
    public function index(){
     return \App\System\View::make('admin');
         } 

     public function showProducts(){
     $products = \App\Model\Product::all();
     $categories = \App\Model\Category::all();
     $admin = $this->is_admin();
     $currency = \App\Model\Configuration::usedCurrency();
     $VAT = \App\Model\Configuration::getVAT();
         return \App\System\View::make('admin/items', ['products' => $products,
                                                       'categories' => $categories,
                                                       'admin'=>$admin,
                                                       'currency' =>$currency,
                                                       'VAT' => $VAT]);
    }
    
     public function showOrders(){
     $orders = \App\Model\Order::all()->toArray();
        $i=0;
    $array = [];
    foreach( $orders as $order){
        $customer = $order['customer_details'];
        $customer = json_decode($customer, true);
        $order['customer_details'] = $customer;
        $array[$i]=$order;
      
      $i++;
     }
       $orders=$array;
       $admin = $this->is_admin();
       $currency = \App\Model\Configuration::usedCurrency();
       $VAT = \App\Model\Configuration::getVAT();
        return \App\System\View::make('admin/orders', ['orders' => $orders,
                                                      'currency' =>$currency,
                                                       'VAT' => $VAT]);
    }
    
    
    public function showFilteredProducts(){
     $category = \App\System\Input::get('category');
     $categories =  \App\Model\Category::all();
     if ($category=='0'){
         $products = \App\Model\Product::all();
     }
     else
     $products = \App\Model\Product::where('category_id','=', $category)->get();
     $admin = $this->is_admin();
     $currency = \App\Model\Configuration::usedCurrency();
     $VAT = \App\Model\Configuration::getVAT();
          return \App\System\View::make("admin/items", ['products' => $products,
                                                        'category' => $category,
                                                        'categories'=>$categories,
                                                        'admin'=>$admin,
                                                        'currency' =>$currency,
                                                        'VAT' => $VAT]);
    }
    
    public function showEmptyForm()    {
        $categories =  \App\Model\Category::all();
        $item = new \App\Model\Product();
        $item -> setAttribute('id', 'new');
        $admin = $this->is_admin();
        $currency = \App\Model\Configuration::usedCurrency();
        $VAT = \App\Model\Configuration::getVAT();
        return \App\System\View::make('admin/item', ['item'=>$item,
                                                    'categories' => $categories, 
                                                    'admin'=>$admin,
                                                    'currency' =>$currency,
                                                     'VAT' => $VAT]);
    } 
    
    public function showItem($id = NULL){
      //show item from iten list
      if (is_null($id)) :   
         $idx = \App\System\Input::get('id');
         $categories =  \App\Model\Category::all();
         $item = \App\Model\Product::find($idx);
         $admin = $this->is_admin();
         $currency = \App\Model\Configuration::usedCurrency();
         $VAT = \App\Model\Configuration::getVAT();
         return \App\System\View::make('admin/item',['item' => $item,
                                                    'categories' => $categories,
                                                    'admin'=>$admin,
                                                    'currency' =>$currency,
                                                    'VAT' => $VAT]);
      
    endif;
     //show item after insert
     if(!is_null($id)) {
          $item = \App\Model\Product::find($id);
          $categories =  \App\Model\Category::all();
          $url = 'admin/item';
          $admin = $this->is_admin();
          $currency = \App\Model\Configuration::usedCurrency();
          $VAT = \App\Model\Configuration::getVAT();
          return \App\System\View::make($url,['item' => $item,
                                            'categories' => $categories,
                                            'admin'=>$admin,
                                            'currency' =>$currency,
                                            'VAT' => $VAT]);
                                            
     }
    }
    
     public function getItemFromAdmin(){
    //validate date before push it to db    
        $item = $this->formValidation();
       
         //product exists, do update
        if ($item->id) {
           //update 
           \App\Model\Product::where('id','=',$id)->update(array($data));
            return $this->showItem($id);
        }
        else // insert new product
     {
         //insert
     //Upload image   
       $file =  \App\Model\File::upload();
      //Insert to DB
        $data = [
            'name'=>$item['name'],
            'category_id'=>$item['category'],
            'price'=> $item['price'],
            'description'=>$item['description'],
            //'img_path'=>$newName,
            'img_path'=>$file
            ];
   
       $id = \App\Model\Product::insertGetId($data);  
       return $this->showItem($id);
     }
        }
     

    public function formValidation(){
         //Check required fields   
        $categories = \App\Model\Category::all();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
                $error['name'] = "Name is required";
            } else {
            $item['name'] = $_POST["name"];
       }
        if (empty($_POST["price"])) {
                $error['price'] = "Price is required";
            } else {
            $item['price'] = $_POST["price"];
        }
        if (empty($_POST["category"])) {
                $error['category'] = "Category is required";
        } else {
            $item['category'] = $_POST["category"];
        }
        if (empty($_POST["editor1"])) {
            $error['description'] = "Description id required";
        } else {
             $item['description'] = trim($_POST["editor1"],'<p></p>');
        }
        }
   
 
    
if ($_POST['validate'])
         return json_encode(array('errors'=>$error,'ok'=>!count($error)));
      
      return $item;
   
    }
     
      public function deleteItem(){
  
         $flag = \App\System\Input::get('flag');
         $id = \App\System\Input::get('id'); 
        
        if ($flag=='1') 
        {
          $img =  \App\Model\Product::where('id','=',$id)->img_path;   
          \App\Model\Product::where('id','=',$id)->delete();
          unlink(IMG_PATH.$img);
         }
         if ($flag=='2')
         {
             array($id);
             $imgs =  \App\Model\Product::whereIn('id',$id)->img_path;  
             \App\Model\Product::whereIn('id',$id)->delete();
             foreach ($imgs as $img){
                 unlink(IMG_PATH.$img);
             }
             return json_encode($id);
         }
        
    }
    
    public function updateItem(){
         $id=\App\System\Input::get('id');
         $item = $this->formValidation();
         //dump($item);
         //dump($_FILES);
         if (($_FILES['fileToUpload']['name'])){
          $deleteImg = \App\Model\Product::find($id);
          $deleteImg = $deleteImg->img_path;
          unlink(IMG_PATH.$deleteImg);
           $file =  \App\Model\File::upload();
         }
         else {
             $file = \App\Model\Product::find($id)->img_path;
         }
           $data = [
            'name'=>$item['name'],
            'category_id'=>$item['category'],
            'price'=> $item['price'],
            'description'=>$item['description'],
            'img_path'=>$file
            ];
        
        \App\Model\Product::where('id','=',$id)->update($data);          
       
      
          return $this->showItem($item->id);
    }
    
    public function showCategories(){
        $categories = \App\Model\Category::all();
         $admin = $this->is_admin();
        return \App\System\View::make('admin/categories',['categories' => $categories, 'admin' =>$admin]);

    }
    
      public function showOrderItem(){
        $id=\App\System\Input::get('id');
        
        $order = \App\Model\Order::find($id);
        $customer = json_decode(\App\Model\Order::find($id)->customer_details);
        $details = \App\Model\Detail::where('header_id','=',$id)->get();
        $admin = $this->is_admin();
        $currency = \App\Model\Configuration::usedCurrency();
        $VAT = \App\Model\Configuration::getVAT();
        return \App\System\View::make('/admin/order', ['order' => $order,
                                                        'details'=> $details, 
                                                        'customer'=>$customer,
                                                        'admin'=>$admin,
                                                        'VAT'=>$VAT,
                                                        'currency'=>$currency]);
        
    }
    
    public function showConfig (){
        $VAT = \App\Model\Configuration::where('parameter','=','VAT')->first();
        $currency = \App\Model\Configuration::where('parameter','=','currency')->first();
        if ($currency->value == 'euro') {$checked['0'] = 'checked';} 
         if ($currency->value == 'usd') {$checked['1'] = 'checked';} 
          if ($currency->value == 'shekel') {$checked['2'] = 'checked';} 
        $orderStatuses = \App\Model\Configuration::where('parameter','=','order_statuses')->first();
        $orderStatuses = json_decode($orderStatuses->value, true);
        $admin = $this->is_admin();
             return \App\System\View::make('/admin/configuration', [ 'VAT'=>$VAT,'currency'=>$checked,'orderStatuses'=>$orderStatuses,'admin'=>$admin]);
    }

    
      public function verify(){
          
        $username = \App\System\Input::get('username');
        $password = \App\System\Input::get('password');
        
        $user = \App\Model\User::where('username', '=', $username)
                ->where('password', '=', $password)
                ->first();
        
        if($user) {
            \App\System\Session::set('username', $user['username']);
            \App\System\Session::set('password', $user['password']);
           return 1;
            }
        return 0;
    }
    
    public function is_admin(){
        if (\App\System\Session::get('username')=='admin' && \App\System\Session::get('password')=='admin') {
            return true;
        }
         \App\System\Session::clear();
         return false;
    }
    
     public function store()
    {
        $file = \App\System\Input::files('file');
        $f = new \App\Model\File();
        $f->upload($file);
    }
    
    public function updateVAT(){
     $VAT = \App\System\Input::get('VAT');
    // dump($VAT);
        \App\Model\Configuration::where('parameter','VAT')->update(['value'=>$VAT]);
                         
     return 'ok';
    }
    
     public function updateCurrency(){
     $currency = \App\System\Input::get('currency');
     //dump($currency);die;
       if ($currency=='1'){
        \App\Model\Configuration::where('parameter','currency')->update(['value'=>'euro']);
       }
       if ($currency=='2'){
        \App\Model\Configuration::where('parameter','currency')->update(['value'=>'usd']);
       }
       if ($currency=='3'){
        \App\Model\Configuration::where('parameter','currency')->update(['value'=>'shekel']);
       }
     return 'ok';
    }
 
 
  

    
}