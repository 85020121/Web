<?php
include "person.php";

class PersonsManager
{
	private $db;

	public function __construct($db)
	{
		$this->setDb($db);
	}
	
	public function setDb($db)
	{
		$this->db = $db;
	}
	
	public function personMaker($array) {
		return $person = new Person($array);
	}
	
	public function addPerson($person) {
		$q = $this->db->prepare('INSERT INTO persons(login, password, email, name, streetNum, street, city, gender, tel, fixe) 
				VALUES(:login, :password, :email, :name, :streetNum, :street, :city, :gender, :tel, :fixe)');
		$id;
		try{
			$this->db->beginTransaction();
	    	$q->execute(array(
	    			'login' => $person->getLogin(),
	    			'password' => $person->getPassword(),
	    			'email' => $person->getEmail(),
	    			'name' => $person->getName(),
	    			'streetNum' => $person->getStreetNum(),
	    	    	'street' => $person->getStreet(),
	    	   		'city' => $person->getCity(),
	     			'gender' => $person->getGender(),
	 	    		'tel' => $person->getTel(),
	    	    	'fixe' => $person->getFixe()
	    	));// or die(print_r($q->errorInfo(), true));
	    	$id = $this->db->lastInsertId();
	    	$this->db->commit();
		} catch (PDOException $e) {
			$this->db->rollback();
			print "Error!" . $e->getMessage() . "</br>";
		}
		return $id;
		
	}
	
/* 	public function getFourProducts($category)
	{
		$q = $this->db->prepare('SELECT * FROM products_info WHERE category=? ORDER BY view_count DESC LIMIT 0,4');
		$q->execute(array($category));
		$products = array();
		while ($data = $q->fetch(PDO::FETCH_ASSOC))
		{
			$products[] = new Product($data);
		}
		return $products;
	} */
		
	
}

/*  
 try
{
	$db = new PDO('mysql:host=localhost;dbname=legumes;charset=UTF8', 'bowen', 'waiwai');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$info = array('login' => "tessst",'password' => "test",'email' => "test");
 
$manager = new PersonsManager($db);
$person = $manager->personMaker($info);
$test = $manager->addPerson($person); 
if ($test) {
	print("OK!!!");
}
else{
	print("ERROR!!!");
}   */

?>