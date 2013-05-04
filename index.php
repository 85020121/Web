<?php
if(!(require_once 'protected/php/cart.php'))
{
	die('ERROR : file protected/php/cart.php does not exist.');
}

if(!(require_once 'protected/php/cookieCart.php'))
{
	die('ERROR : file protected/php/cookieCart.php does not exist.');
}

if(!session_id())
	session_start();


// auto logout when page inactive after 10 minutes
// set timeout period in seconds
$inactive = 600;
// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { session_destroy(); header("Location: index.php"); }
}

$_SESSION['timeout'] = time();
/*
if(!isset($_COOKIE['cart'])) {
//	setcookie("cart", "", time()-3600);
	$cart = Cart::getCart();
//	setcookie("cart", serialize($cart), time()+3600);
}

setcookie("user", "Alex Porter", time()+3600);
if (!isset($_COOKIE["user"])) {
	echo "您浏览器的 cookie 功能被禁用，请启用此功能。";                
} else {
    echo "您浏览器的 cookie 功能OK。";
}  


$cart=new CookieCart();
ob_end_flush();*/ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<title>放心菜</title>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/default.css"/>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/header.css"/>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/registre.css"/>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/shoppingList.css"/>
<meta name="description" content="放心菜，送到家"/>
<meta name="keywords" content="有机蔬菜，放心菜，荆门送菜到家，买菜网"/>
<link rel="alternate" type="application/rss+xml" title="" href=""/>
<link rel="icon" href="protected/images/carrot.png" type="image/png"/>
 
<!--
<script src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.1/mootools-yui-compressed.js" type="text/javascript"></script>
<script src="protected/js/jquery.js" type="text/javascript"></script> -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="protected/js/jquery.livequery.js"></script>
<script type="text/javascript" src="protected/js/login.js"></script>
<script type="text/javascript" src="protected/js/shopping.js"></script>
<script src="protected/js/jquery.parallaxscroll.js" type="text/javascript"></script>
<!--
<script type="text/javascript">

	$(document).ready(function() {
	
		$('.legumes_box').parallaxScroll({ 
			multiplier: 2.0,
		});
		
		$('.fruits_box').parallaxScroll({ 
			multiplier: 4.0,
		});
		
		$('.meet_box').parallaxScroll({ 
			multiplier: 2.0
		});
		
		$('.scroll-text').parallaxScroll({ 
			multiplier: 4.0
		});
		
		$('#head').parallaxScroll({ 
			multiplier: 0.4
		});
		
		$('.link').parallaxScroll({ 
			multiplier: 1.2
		});
		
		$('.absolute_3').parallaxScroll({ 
			multiplier: 6.0,
		});
		
		$('.one').parallaxScroll({ 
			multiplier: 1.2,
		});
		
		$('element').parallaxscroll({ 
		    multiplier: '2.0',
		    position: 'absolute',
		    negative: true
		});
	
	});
</script> -->

<script type="text/javascript">
//	$(document).ready(function() {
function checkCookieEnable() {
	var cookieEnabled=(navigator.cookieEnabled)? true : false;
	//if not IE4+ nor NS6+
	if (typeof navigator.cookieEnabled=="undefined" && !cookieEnabled){ 
		document.cookie="testcookie";
		cookieEnabled=(document.cookie.indexOf("testcookie")!=-1)? true : false;
	}
	return cookieEnabled;
}

/*
if (!checkCookieEnable()) {
	alert("您浏览器的 cookie 功能被禁用，请启用此功能。"); 
} else {
    alert("您浏览器的 cookie 功能OK。");
} 
*/

</script>

</head>

<body>

<!-- bubble block -->
<div id="coherent_bubble_node" class="box bubble" role="alertdialog">
	<div class="bubbleContainer">
		<div class="bubbleContent">
		
		</div>
	</div>
	<span class="arrow"></span>
</div>

<?php 
if(!(include 'protected/php/includes.php'))
{
	die('ERROR : file protected/php/includes.php does not exist');
}

?>

<?php
$db = dbConnect();
$productsManager = new ProductsManager($db);
?>
	
	<div id="body">
		<div class="wrap">
		
		<?php
		$pages_dir = 'protected/pages';
		if (!empty($_GET['p'])) {
			$pages = scandir($pages_dir, 0);
			//print_r($pages);
			unset($pages[0], $pages[1]);
			
			$p = $_GET['p'];
			
			if (in_array($p.'.inc.php', $pages)) {
				include($pages_dir.'/'.$p.'.inc.php');
			} else {
				echo 'Sorry, page not found : '.$p;
			}
		} else {
			include($pages_dir.'/home.inc.php');
		}
		?>

		</div> <!-- end of wrap -->

	</div> <!-- end of body -->
	<div style="color:black;position:absolute;top:1500px">
<h3>
<?php // print_r($_SESSION['cart']); 
?></h3>
</div>	

</body>
</html>