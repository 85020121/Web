<?php

class Cart {
	static protected $ins; // instance
	protected $item = array(); // orders stocker
	
	final protected function __construct(){}
	
	final protected function __clone(){}
	
	static protected function getIns(){
		if (!(self::$ins instanceof self)) {
			self::$ins = new self();
		}
		return self::$ins;
	}
	
	static public function getCart(){
		if (!isset($_SESSION['cart']) || !($_SESSION["cart"] instanceof self)) {
			$_SESSION['cart'] = self::getIns();
		}
		return $_SESSION['cart'];
	}

/*	static public function getCart(){
		if (!isset($_COOKIE['cart'])){// || !(unserialize($_COOKIE['cart']) instanceof self)) {
			setcookie("cart", serialize(self::getIns()), time()+3600);
			echo '<script> alert("new cart"); </script>';
		}
		return unserialize($_COOKIE['cart']); 
		return self::getIns();
	}
*/
	public function getItems() {
		return $this->item;
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
			return;
		}
		
		$this->item[$id] = array();
		$this->item[$id]['num'] = 1;
		$this->item[$id]['name'] = $name;
		$this->item[$id]['price'] = $price;
		$this->item[$id]['format'] = $format;
		$this->item[$id]['img'] = $img;
	}
	
	public function reduceItem($id, $num){
		if (!$this->isInItem($id)) {
			return;
		}
		
		if ($num >= $this->item[$id]['num']) {
			unset($this->item[$id]);
		} else {
			$this->item[$id]['num'] -= $num;
		}
	}
	
	public function delItem($id){
		if ($this->isInItem($id)) {
			unset($this->item[$id]);
		}
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
		return $sum;
	}
	
	public function emptyItem(){
		$this->item = array();
	}
}


?>