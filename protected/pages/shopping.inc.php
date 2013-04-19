
<?php
//$cart=Cart::getCart();
if(isset($_GET['jsAction'])){
	$_GET['jsAction']();
}

// add goods to shopping cart
function addGoods(){
	$cart=Cart::getCart();
	$cart->addItem($_POST['id'],$_POST['name'],$_POST['price'],$_POST['format']);
}
//print_r($cart);

?>


