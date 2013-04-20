<?php
require_once 'cart.php';
if(!session_id())
	session_start();

//$cart=Cart::getCart();
if(isset($_GET['jsAction'])){
	$_GET['jsAction']();
}

// add goods to shopping cart
function addGoods(){
	$cart=Cart::getCart();
//	$cart->addItem($_GET['id'],$_GET['name'],$_GET['price'],$_GET['format']);
	$cart->addItem($_POST['id'],$_POST['name'],$_POST['price'],$_POST['format']);
	$html = '';
	foreach ($cart->getItem() as $key=>$value){
		$html = $html . '<p>name is ' . $value['name'] . ' and price is '.$value['price'] . '</p>';
	}
	echo json_encode(array("data"=>$cart->getOrderSum(), "html"=>$html));//getItem());
}
?>


