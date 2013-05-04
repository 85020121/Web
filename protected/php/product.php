<?php
class Product
{
	private $id;
	private $view_count;
	private $name;
	private $category;
	private $sub_category;
	private $pic_url;
	private $price;
	private $vip_price;
	private $serial_num;
	private $original;
	private $format;
	private $duration;
	private $mark;
	private $evaluation;
	private $description;
	private $images;
	private $addon;
	    
	public function getId() 
	{
	  return $this->id;
	}
	
	public function setId($value) 
	{
	  $this->id = $value;
	}
	
	public function __construct($product)
	{
		$this->hydrate($product);
	}
	
	public function getView_count() 
	{
	  return $this->view_count;
	}
	
	public function setView_count($value) 
	{
	  $this->view_count = $value;
	}
		    
	public function getName() 
	{
	  return $this->name;
	}
	
	public function setName($value) 
	{
	  $this->name = $value;
	}
	    
	public function getCategory() 
	{
	  return $this->category;
	}
	
	public function setCategory($value) 
	{
	  $this->category = $value;
	}
	    
	public function getSub_category() 
	{
	  return $this->sub_category;
	}
	
	public function setSub_category($value) 
	{
	  $this->sub_category = $value;
	}
		    
	public function getPic_url() 
	{
	  return $this->pic_url;
	}
	
	public function setPic_url($value) 
	{
	  $this->pic_url = $value;
	}
	    
	public function getPrice() 
	{
	  return $this->price;
	}
	
	public function setPrice($value) 
	{
	  $this->price = number_format((float)$value, 2, '.', '');
	}
	    
	public function getVip_price() 
	{
	  return $this->vip_price;
	}
	
	public function setVip_price($value) 
	{
	  $this->vip_price = $value;
	}
	    
	public function getSerial_num() 
	{
	  return $this->Serial_num;
	}
	
	public function setSerial_num($value) 
	{
	  $this->Serial_num = $value;
	}	
	    
	public function getOriginal() 
	{
	  return $this->Original;
	}
	
	public function setOriginal($value) 
	{
	  $this->Original = $value;
	}
	    
	public function getFormat() 
	{
	  return $this->Format;
	}
	
	public function setFormat($value) 
	{
	  $this->Format = $value;
	}
	    
	public function getDuration() 
	{
	  return $this->Duration;
	}
	
	public function setDuration($value) 
	{
	  $this->Duration = $value;
	}
	    
	public function getMark() 
	{
	  return $this->Mark;
	}
	
	public function setMark($value) 
	{
	  $this->Mark = $value;
	}
	    
	public function getEvaluation() 
	{
	  return $this->Evaluation;
	}
	
	public function setEvaluation($value) 
	{
	  $this->Evaluation = $value;
	}
	    
	public function getDescription() 
	{
	  return $this->Description;
	}
	
	public function setDescription($value) 
	{
	  $this->Description = $value;
	}
	    
	public function getImages() 
	{
	  return $this->Images;
	}
	
	public function setImages($value) 
	{
	  $this->Images = $value;
	}
	    
	public function getAddon() 
	{
	  return $this->Addon;
	}
	
	public function setAddon($value) 
	{
	  $this->Addon = $value;
	}
	
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			// On rcupre le nom du setter correspondant  l'attribut.
			$method = 'set'.ucfirst($key);
			 
			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}
}

?>