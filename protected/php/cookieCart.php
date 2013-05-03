<?php

class CookieCart {
	static protected $ins; // instance
	protected $itme = array(); // orders stocker
	
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
		if (!isset($_COOKIE['cart']) || !(unserialize($_COOKIE["cart"]) instanceof self)) {
			$_COOKIE['cart'] = serialize(self::getIns());
			echo '<script> alert("new cart"); </script>';
		}
		return unserialize($_SESSION['cart']);
	}
*/
	public function getItems() {
		return $this->itme;
	}
	
	public function isInItem($goodsId){
		if ($this->getItemType() == 0) {
			return false;
		}
		
		if (!(array_key_exists($goodsId, $this->itme))) {
			return false;
		} else {
			return $this->itme[$goodsId]['num']; // return the quantity of the goods
		}
	}
	
	// add a goods
	public function addItem($id, $name, $price, $format, $img){
		if ($this->isInItem($id)) {
			$this->itme[$id]['num'] += 1;
			return;
		}
		
		$this->itme[$id] = array();
		$this->itme[$id]['num'] = 1;
		$this->itme[$id]['name'] = $name;
		$this->itme[$id]['price'] = $price;
		$this->itme[$id]['format'] = $format;
		$this->itme[$id]['img'] = $img;
	}
	
	public function reduceItem($id, $num){
		if (!$this->isInItem($id)) {
			return;
		}
		
		if ($num >= $this->itme[$id]['num']) {
			unset($this->itme[$id]);
		} else {
			$this->itme[$id]['num'] -= $num;
		}
	}
	
	public function delItem($id){
		if ($this->isInItem($id)) {
			unset($this->itme[$id]);
		}
	}
	
	public function getItem(){
		return $this->itme;
	}
	
	public function getItemType(){
		return count($this->itme);
	}
	
	public function getOrderSum(){
		if ($this->getItemType() == 0) {
			return 0;
		}
		
		$sum = 0;
		foreach ($this->itme as $key=>$value){
			$sum += $value['num'];
		}
		return $sum;
	}
	
	public function getPrice($id){
		if ($this->isInItem($id)) {
			return $this->itme[$id]['price']*$this->itme[$id]['num'];
		} else {
			return 0;
		}
	}
	
	public function getSum(){
		if ($this->getItemType()==0) {
			return 0;
		}
		
		$sum=0;
		foreach ($this->itme as $key=>$value){
			$sum += $value['price'] * $value['num'];
		}
		return $sum;
	}
	
	public function emptyItem(){
		$this->itme = array();
	}
}


?>