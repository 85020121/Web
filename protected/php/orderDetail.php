<?php

class OrderDetail {
	private $goodsId;
	private $goodsName;
	private $price;
	private $quantity;
	private $format;
	
	public function __construct($order)
	{
		$this->hydrate($order);
	}
	
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			// On rŽcupre le nom du setter correspondant ˆ l'attribut.
			$method = 'set'.ucfirst($key);
	
			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}
	    
	public function getFormat() 
	{
	  return $this->format;
	}
	
	public function setFormat($value) 
	{
	  $this->format = $value;
	}
	    
	public function getQuantity() 
	{
	  return $this->quantity;
	}
	
	public function setQuantity($value) 
	{
	  $this->quantity = $value;
	}
	    
	public function getPrice() 
	{
	  return $this->price;
	}
	
	public function setPrice($value) 
	{
	  $this->price = $value;
	}
	    
	public function getGoodsName() 
	{
	  return $this->goodsName;
	}
	
	public function setGoodsName($value) 
	{
	  $this->goodsName = $value;
	}
	    
	public function getGoodsId() 
	{
	  return $this->goodsId;
	}
	
	public function setGoodsId($value) 
	{
	  $this->goodsId = $value;
	}
	
}

?>