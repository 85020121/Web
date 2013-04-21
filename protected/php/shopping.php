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
	$html = getCartListHtml();
	echo json_encode(array("data"=>$cart->getOrderSum(), "html"=>$html));//getItem());
}

// remove goods from shopping cart
function delItem(){
	$cart=Cart::getCart();
	$cart->delItem($_POST['id']);
	$html = getCartListHtml();
	echo json_encode(array("data"=>$cart->getOrderSum(), "html"=>$html));//getItem());
}

function getCartListHtml(){
	$cart=Cart::getCart();
	$html = '';
	if($cart->getItemType() > 0) {
		$html = $html . '<div class="cartInfo"><div class="cartDetail">';
		$html = $html . '<div class="cartName">商品名称</div>';
		$html = $html . '<div class="cartPrice">单价</div>';
		$html = $html . '<span class="cartQuantity">数量</span>';
		$html = $html . '<br></div></div>';
		foreach ($cart->getItem() as $key=>$value){
			$html = $html . '<div class="cartInfo"><div class="cartDetail">';
			$html = $html . '<input class="cartID" value='.$key.'>';
			$html = $html . '<div class="cartName">' . $value['name']. '</div>';
			$html = $html . '<div class="cartPrice">' . $value['price']. '元</div>';//*$value['num'] 
			$html = $html . '<span class="cartQuantity">' . $value['num'] . '</span>';
			$html = $html . '<img src="/protected/images/remove.png" class="removeCart" title="删除"/>';
			$html = $html . '<br></div></div>';
		}
		$html = $html . '<div id="cartTotal"><span>总价:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $cart->getSum() . '元</span>';
		$html = $html . '<a href="#" id="goShopping">进入购物车</a></div>';
	} else { 
		$html = '<div id="cartTotal"><span style="margin-left:25%;">您还没有选择任何商品</span></div>';
	}
	return $html;
}
?>
		
		