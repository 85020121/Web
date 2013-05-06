<?php

class CookieCart {

	static $cookieName = 'CSC';
	static $saveTime;
	static $cookieLifeCircle = 1000;
	
	private $key;
	private $iv_size;
	private $iv;
	
	protected $item = array(); // orders stocker
	
	
	function __construct(){
		$this->key = pack('H*', "636f6f6b69654b657949734f6e655069656365");
		$this->iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$this->iv = mcrypt_create_iv($this->iv_size, MCRYPT_RAND);
		if(isset($_COOKIE[self::$cookieName])) {
			$this->item = $this->decryptCookie($_COOKIE[self::$cookieName]);
		}
    	self::$saveTime=time()+self::$cookieLifeCircle;
		$this->updateCookie();
    }
	
	final protected function __clone(){}
	
	private function updateCookie() {
		//ob_start();
		setcookie(self::$cookieName, $this->cryptCookie($this->item), self::$saveTime, '/');		
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
	
	// --- ENCRYPTION ---
    
    private function cryptCookie($cookie) {
    	$cookie_utf8 = serialize($cookie);
    	$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key,
                                 $cookie_utf8, MCRYPT_MODE_CBC, $this->iv);
		$ciphertext = $this->iv . $ciphertext;
    	# encode the resulting cipher text so it can be represented by a string
    	$ciphertext_base64 = base64_encode($ciphertext);
    	return $ciphertext_base64;
    }

	private function decryptCookie($cookie) {
	    $ciphertext_dec = base64_decode($cookie);
	 	$iv_dec = substr($ciphertext_dec, 0, $this->iv_size);    
   		# retrieves the cipher text (everything except the $iv_size in the front)
  		$ciphertext_dec = substr($ciphertext_dec, $this->iv_size);
	    # may remove 00h valued characters from end of plain text
    	$plaintext_utf8_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key,
                                         $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
        $plaintext_utf8_dec = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $plaintext_utf8_dec);
        return unserialize($plaintext_utf8_dec);
	}
}


ob_start();
$cart = new CookieCart();
//$cart->addItem(12, '苹果', 10.5, '500g', 'aaaaaasadasdw/imag/22a/pjj.png');
//$cart->addItem(3, '橙子', 10.5, '500g', 'aaaaaaa');
echo "<hr color='red'>";
var_dump($cart->getItem());

?>