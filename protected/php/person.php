<?php
class Person {
	private $id;
	private $login;
	private $password;
	private $name;
	private $email;
	private $street;
	private $city;
	private $gender;
	private $tel;
	private $fixe;
	private $streetNum;
	
 	public function __construct($person)
	{
		$this->hydrate($person);
	} 
	    
	public function getStreetNum() 
	{
	  return $this->streetNum;
	}
	
	public function setStreetNum($value) 
	{
	  $this->streetNum = $value;
	}
	    
	public function getFixe() 
	{
	  return $this->fixe;
	}
	
	public function setFixe($value) 
	{
	  $this->fixe = $value;
	}
	    
	public function getTel() 
	{
	  return $this->tel;
	}
	
	public function setTel($value) 
	{
	  $this->tel = $value;
	}
	
	public function getGender() 
	{
	  return $this->gender;
	}
	
	public function setGender($value) 
	{
	  $this->gender = $value;
	}    
	
	public function getCity() 
	{
	  return $this->city;
	}
	
	public function setCity($value) 
	{
	  $this->city = $value;
	}    
	
	public function getStreet() 
	{
	  return $this->street;
	}
	
	public function setStreet($value) 
	{
	  $this->street = $value;
	}
	    
	public function getEmail() 
	{
	  return $this->email;
	}
	
	public function setEmail($value) 
	{
	  $this->email = $value;
	}    
	
	public function getName() 
	{
	  return $this->name;
	}
	
	public function setName($value) 
	{
	  $this->name = $value;
	}    
	
	public function getPassword() 
	{
	  return $this->password;
	}
	
	public function setPassword($value) 
	{
	  $this->password = $value;
	}
	    
	public function getLogin() 
	{
	  return $this->login;
	}
	
	public function setLogin($value) 
	{
	  $this->login = $value;
	}
	    
	public function getId() 
	{
	  return $this->id;
	}
	
	public function setId($value) 
	{
	  $this->id = $value;
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
}

?>