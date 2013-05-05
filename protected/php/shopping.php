<?php

//require_once 'cart.php';
require_once 'cookieCart.php';
require_once 'functions.php';

if(!session_id())
	session_start();

//$cart=Cart::getCart();
if(isset($_GET['jsAction'])){
	$_GET['jsAction']();
}

//ob_end_flush();

// add goods to shopping cart
function addGoods(){
/*	$cart=Cart::getCart();
	$cart->addItem($_POST['id'],$_POST['name'],$_POST['price'],$_POST['format'],$_POST['img']);
	$html = getCartListHtml();
	echo json_encode(array("data"=>$cart->getOrderSum(), "html"=>$html));//getItem());  */
//	ob_start();
	$cart=new CookieCart();
	$cart->addItem($_POST['id'],$_POST['name'],$_POST['price'],$_POST['format'],$_POST['img']);
//	ob_end_flush();
	//echo json_encode(array("data"=>$cart->getOrderSum(), "html"=>$html));//getItem());
}

// remove goods from shopping cart
function delItem(){
	$cart=Cart::getCart();
	$cart->delItem($_POST['id']);
	$html = getCartListHtml();
	echo json_encode(array("data"=>$cart->getOrderSum(), "html"=>$html));//getItem());
}

/* session
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
} */

function getCartListHtml(){
	$cart=new CookieCart();
	$html = '<div class="ordersList">';
	if($cart->getItemType() > 0) {
		foreach ($cart->getItem() as $key=>$value){
			$html = $html . '<div class="cartInfo">';
			$html = $html . '<div id="item-'. $key .'" class="cartDetail">';
			$html = $html . '<input class="cartID" value='.$key.'>';
			$html = $html . '<div class="cartName">' . $value['name']. '</div>';
			$html = $html . '<div class="cartPrice"><span class="getPrice">' . $value['price']. '</span>&nbsp元</div>';
			$html = $html . '<span class="cartQuantity">' . $value['num'] . '</span>';
			$html = $html . '<img src="/protected/images/remove.png" class="removeCart" title="删除"/>';
			$html = $html . '<br></div></div>';
		}
	}
	$html = $html . '</div><div id="cartTotal"><p>总价:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="priceSum">' . $cart->getSum() . '</span>&nbsp;元';
	$html = $html . '<a href="/index.php?p=shopping" id="goShopping">进入购物车</a></p></div>';
	return $html;
} 

function getShoppingList() {
	$db = dbConnect();
	$productsManager = new ProductsManager($db);
	$products = $productsManager->getFourProducts("fruit");
	$html = '';
	$html = $html . '<div class="row equalize clearfix">';
	for ($i=0; $i<4; $i++) {
		$html = $html . '<div class="gs grid-1of4">';
		$html = $html . '<div class="item copy">';
		$html = $html . '<input class="goodsID" style="display:none" value='.$products[$i]->getId().' />';
		$html = $html . '<a href="#?itemId='.$products[$i]->getId().'" class="itemBlock">';
		$html = $html . '<img src=' . $products[$i]->getPic_url() . ' alt width="150" height="130">';
		$html = $html . '<h3 class="goodsName">'.$products[$i]->getName().'</h3>';
		$html = $html . '<p><span class="more left">规格：<span class="goodsFormat">'.$products[$i]->getFormat().'</span></span>';
		$html = $html . '<span class="more right">价格：￥<span class="goodsPrice">'.$products[$i]->getPrice().'</span>元</span></p>';
		$html = $html . '<article><p><span>产地：'.$products[$i]->getOriginal().'</span></p>';
		$html = $html . '<p><span>品牌：'.$products[$i]->getMark().'</span></p>';
		$html = $html . '<p><span>保质期：'.$products[$i]->getDuration().'</span></p>';
		$html = $html . '<p><span>描述：'.$products[$i]->getDescription().'</span></p>';
		$html = $html . '</article>';
		$html = $html . '</a>';
		$html = $html . '<p><button class="addToCartButton">加入购物车</button></p>';// onclick="addTest($(this),'.$products[$i]->getId().',\''.$products[$i]->getName().'\','.$products[$i]->getPrice().',\''.$products[$i]->getFormat().'\')">加入购物车</button></p>';
		$html = $html . '</div>';
		$html = $html . '</div>';
	}
	$html = $html . '</div>';
	
/*	$html = $html . '<div class="row equalize clearfix">';
	for ($i=0; $i<4; $i++) {
		$html = $html . '<div class="gs grid-1of4">';
		$html = $html . '<div class="item copy">';
		$html = $html . '<a href="#?itemId='.$products[$i]->getId().'" class="itemBlock">';
		$html = $html . '<img src=' . $products[$i]->getPic_url() . ' alt width="150" height="130">';
		$html = $html . '<h3>'.$products[$i]->getName().'</h3>';
		$html = $html . '<p><span class="more left">规格：'.$products[$i]->getFormat().'</span>';
		$html = $html . '<span class="more right">价格：￥'.$products[$i]->getPrice().'元</span></p>';
		$html = $html . '</a>';
//		$var = array("id"=>$products[$i]->getId(), "name"=>$products[$i]->getName(), "price"=>$products[$i]->getPrice(), "format"=>$products[$i]->getFormat());
//		$html = $html . '<p><button onclick="addTest('.json_encode($var).')">加入购物车</button></p>';
		$html = $html . '<p><button class="myButton" onclick="addTest('.$products[$i]->getId().',\''.$products[$i]->getName().'\','.$products[$i]->getPrice().',\''.$products[$i]->getFormat().'\')">加入购物车</button></p>';
		$html = $html . '</div>';
		$html = $html . '</div>';
	}
	$html = $html . '</div>'; */
	return $html;

}

function getCustomerShoppingList() {
	//$cart = Cart::getCart();
	$cart=new CookieCart();
	$html = '';
	if ($cart->getItemType() == 0) {
			$html = 'None';
	} else {
		foreach($cart->getItem() as $key=>$value) {
			$html = $html . '<li class="cart-product clearfix top-divided"><div class="product-container"><div class="item-overlay"><p class="h2"><span class="removed">从购物车中删除此件物品</span></p></div><div class="media-block"><div data-relatedlink="/" class="media product-image mtm relatedlink"><img src="' . $value['img'] . '" alt></div><div class="content product-info pvm"><div class="media-block alt clearfix"><ul class="media h-list alt price-quantity"><li class="orderID" style="display:none">' . $key . '</li><li class="item first product-format"><span class="a11y">规格&nbsp;:</span>' . $value['format'] . '</li><li class="item first product-price"><span class="a11y">单价&nbsp;:</span><span class="orderPrice">' . $value['price'] . '</span> 元</li><li class="item phl quantity-select"><label class="a11y">数量</label><input class="quantityInput" value=' . $value['num'] . ' min="1" length="3"  maxlength="4" class></li><li class="item quantity-price h4"><span class="a11y">总价&nbsp;:</span><strong><span class="orderTotal">'. number_format((float)($value['price'] * $value['num']), 2, '.', '') . '</span> 元</strong></li></ul><div class="product-title"><h2 clss="content h3 strong"><a href="?id=' . $key . '" class="alt">' . $value['name'] . '</a> </h2></div></div><div class="shopping-product-admin section top-divided mbm"><p class="product-admin h-group"><a href="#" class="product-remove item">删除</a><a href="#" class="product-remove item pipe">收藏</a></p></div></div></div></div></li>';
		}
	}
	echo $html;
}

function getOrdersSum() {
	//$cart = Cart::getCart();
	$cart=new CookieCart();
	echo $cart->getSum();
}

function getOrdersQuantity() {
	$cart=new CookieCart();
	echo $cart->getOrderSum();
}

function updateQuantity() {
	$cart=new CookieCart();
	$cart->updateQuantity($_POST['id'], $_POST['quantity']);
}

function removeOrder() {
	$cart=new CookieCart();
	$cart->delItem($_POST['id']);
}

function checkCookie(){
        setcookie("CookieCheck","OK");
                
                if (!isset($_COOKIE["CookieCheck"]))
                {
                        echo "您浏览器的 cookie 功能被禁用，请启用此功能。";                
                }
                else 
                {
                        echo "您浏览器的 cookie 功能OK。";;
                }
}        
?>
		
		
