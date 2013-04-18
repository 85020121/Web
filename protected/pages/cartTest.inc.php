
<?php
$cart=Cart::getCart();
$cart->addItem($_POST['goodsId'],$_POST['goodsName'],$_POST['goodsPrice'],$_POST['goodsFormat']);

print_r($cart);

?>


