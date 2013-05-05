<?php

class CookieCart {

	static $cookieName = 'shopping';
	static $saveTime;
	static $cookieLifeCircle = 100;
	
	protected $item = array(); // orders stocker
	
	
	function __construct(){
		if(isset($_COOKIE[self::$cookieName])) {
			$this->item = unserialize($_COOKIE[self::$cookieName]);
		}
    	self::$saveTime=time()+self::$cookieLifeCircle;
		$this->updateCookie();
    }
	
	final protected function __clone(){}
	
	private function updateCookie() {
		//ob_start();
		setcookie(self::$cookieName,serialize($this->item),self::$saveTime, '/');		
		//ob_end_flush();
	}

    public function clear_cart()
    {
      setcookie(self::$cookieName,'',time()-3600); 
    }
	
	public function isInItem($goodsId){
		if ($this->getItemType() == 0) {
			return false;
		}
		
		if (!(array_key_exists($goodsId, $this->item))) {
			return false;
		} else {
			return $this->item[$goodsId]['num']; // return the quantity of the goods
		}
	}
	
	// add a goods
	public function addItem($id, $name, $price, $format, $img){
		if ($this->isInItem($id)) {
			$this->item[$id]['num'] += 1;
		} else {
			$this->item[$id] = array();
			$this->item[$id]['num'] = 1;
			$this->item[$id]['name'] = $name;
			$this->item[$id]['price'] = number_format((float)$price, 2, '.', '');
			$this->item[$id]['format'] = $format;
			$this->item[$id]['img'] = $img;
		}
		$this->updateCookie();
	}
	
	public function updateQuantity($id, $quantity){
		if (!$this->isInItem($id) || $quantity <=0) {
			return;
		}

		$this->item[$id]['num'] = $quantity;
		
		$this->updateCookie();
	}	
	
	public function reduceItem($id){
		if (!$this->isInItem($id)) {
			return;
		}
		
		if ($this->item[$id]['num'] <=1) {
			unset($this->item[$id]);
		} else {
			$this->item[$id]['num'] -= 1;
		}
		$this->updateCookie();
	}
	
	public function delItem($id){
		if ($this->isInItem($id)) {
			unset($this->item[$id]);
		}
		$this->updateCookie();
	}
	
	public function getItem(){
		return $this->item;
	}
	
	public function getItemType(){
		return count($this->item);
	}
	
	public function getOrderSum(){
		if ($this->getItemType() == 0) {
			return 0;
		}
		
		$sum = 0;
		foreach ($this->item as $key=>$value){
			$sum += $value['num'];
		}
		return $sum;
	}
	
	public function getPrice($id){
		if ($this->isInItem($id)) {
			return $this->item[$id]['price']*$this->item[$id]['num'];
		} else {
			return 0;
		}
	}
	
	public function getSum(){
		if ($this->getItemType()==0) {
			return 0;
		}
		
		$sum=0;
		foreach ($this->item as $key=>$value){
			$sum += $value['price'] * $value['num'];
		}
		return number_format((float)$sum, 2, '.', '');;
	}
	
	public function emptyItem(){
		$this->item = array();
	}
}

/*
ob_start();
$cart = new CookieCart();
$cart->addItem(1, 'test', 10.5, '500g', 'aaaaaaa');
$cart->addItem(1, 'test', 10.5, '500g', 'aaaaaaa');
echo "<hr color='red'>";
echo "ADD  ";
print_r($cart);
$cart->reduceItem(1);
echo "<hr color='red'>";
echo "REDUCE  ";
print_r($cart);

echo "<hr color='red'>";
if(isset($_COOKIE[$cart::$cookieName]))
	print_r(unserialize($_COOKIE[$cart::$cookieName]));
//ob_end_flush();

$cart = new CookieCart();
$cart->addItem(5, 'test', 10.5, '500g', 'aaaaaaa');
*/
?>