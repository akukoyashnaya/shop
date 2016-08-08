<?php
namespace App\Controller;
    
    class NavigationController {
    
    public function Breadcrumbs() {
      
    $path = $_SERVER["REQUEST_URI"];
   //$path = $_SERVER["PHP_SELF"];
	$parts = explode('/',$path);
	if (count($parts) < 2)
	{
	    $crumbs = "TeaShop";
	    dump($crumbs);
	    return $crumbs;
	}
	
	else
	{
	$crumbs .=   "<a href=\"/\">TeaShop</a> / ";
	for ($i = 1; $i < count($parts)-1; $i++)
    	{
    //	if (!strstr($parts[$i],"."))
     //   	{
        	$crumbs .= ("<a href=\"");
        	for ($j = 0; $j <= $i; $j++) 
        	{ 
        	    $crumbs.= ($parts[$j])."/";
        	    
        	};
        	  $crumbs .= ("\">". ucfirst(urldecode($parts[$i]))."</a> /");
        	 
        	} $crumbs .=ucfirst(urldecode($parts[count($parts)-1]));
   
	};  
	$crumbs = trim($crumbs, '/');
     return $crumbs;
        
    }
    
    public function getBackPath($crumbs){
	    	$crumbs = explode('/', $crumbs);
	    
	    	$x =  	 array_pop($crumbs);
	    	$backPath = implode('/',$crumbs);
	    //	$backPath = implode('/',$crumbs);
    	return $backPath;
    }
}
