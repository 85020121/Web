<?php
include "product.php";

class ProductsManager
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
	
	public function getFourProducts($category)
	{
		$q = $this->db->prepare('SELECT * FROM products_info WHERE category=? ORDER BY view_count DESC LIMIT 0,5');
		$q->execute(array($category));
		$products = array();
		while ($data = $q->fetch(PDO::FETCH_ASSOC))
		{
			$products[] = new Product($data);
		}
		return $products;
	}
		
	
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
$manager = new ProductsManager($db);
$test = $manager->getFourProducts('fruit'); 
echo $test[3]->getName(); */
?>