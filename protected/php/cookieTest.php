<?php
class Cart
{

  public $cart=''; 

  static $cart_sign ='test3';//购物车cookie名字
  
  static $savetime=3600;        //默认购物车信息保存1小时
  
  
  
    //初始化购物车
  function __construct()
  {
      $this->cart=isset($_COOKIE[self::$cart_sign])?unserialize(stripslashes($_COOKIE[self::$cart_sign])):'';
      self::$savetime=time()+self::$savetime;
  }
  //往购物车添加商品
  public function add_cart($goods_id,$goods_num)
  {

      $cart=$this->cart;
      
      if(!empty($cart))
      { 
        
          if(isset($cart[$goods_id]))
          {
              return '该商品已在购物车中！';
          }
        
          $cart[$goods_id][]=$goods_id;
          $cart[$goods_id][]=$goods_num;
          
  
      }else
      {
          $cart[$goods_id][]=$goods_id;
          $cart[$goods_id][]=$goods_num;
      } 
  
      setcookie(self::$cart_sign,serialize($cart),self::$savetime, '/');

  return '商品成功放入购物车';  
  }
  
    //删除购物车内某个商品
    public function del_cart($goods_id)
    {

  $cart=$this->cart;

  //删除该商品在数组中的位置
  
  if(isset($cart[$goods_id]))
  {
    unset($cart[$goods_id]);
    
  }else
  {
  return '该商品不在购物车中';
  }
  setcookie(self::$cart_sign,serialize($cart),self::$savetime);
  
  return '删除商品成功！';

    }
    //修改购物车商品数量
    public function upd_cart($goods_id,$goods_num)
    { 
    $cart =$this->cart; 
  
        if(empty($cart)) 
        {
        return "购物车里没有任何物品";
        }
        
        if(!isset($cart[$goods_id]))
        {
          return "购物车里没有该商品";
        }
        
        $newcart=array();
        
  foreach($cart as $key=>$c)
  {
      if($key==$goods_id)
      {
          $c[1]=$goods_num;
      }

      $newcart[$c[0]][]=$c[0];
      
      $newcart[$c[0]][]=$c[1];

  }
  setcookie(self::$cart_sign,serialize($newcart),self::$savetime);

  return "成功修改!";
    } 
    //获取购物车商品信息
    public function get_cart()
    {
      return $this->cart;
    }
    //清空购物车
    public function clear_cart()
    {
      setcookie(self::$cart_sign,'',time()-3600); 
    }
    
    function __destruct()
    {
    // unset($this->cart);
    }

}
ob_start();

$cart=new Cart();


$rand=rand();

//echo $cart->add_cart(77765,999);
echo $cart->add_cart(222222,99122);


//echo $cart->upd_cart(9125,200);

//$cart->del_cart(9125);

$cart->clear_cart();
//print_r($cart);

$cart=$cart->get_cart();
//print_r($cart);

echo "<hr color='red'>";
/*
echo $cart->add_cart($rand,$rand);

echo $cart->add_cart($rand,$rand);

echo $cart->add_cart($rand,$rand);
*/
print_r($cart);
//var_dump($cart);
 ob_end_flush()

?>