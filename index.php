<?php
if(!(require_once 'protected/php/cart.php'))
{
	die('ERROR : file protected/php/cart.php does not exist.');
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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<title>放心菜</title>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/default.css"/>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/registre_form.css"/>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/login.css"/>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/registre.css"/>
<meta name="description" content="放心菜，送到家"/>
<meta name="keywords" content="有机蔬菜，放心菜，荆门送菜到家，买菜网"/>
<link rel="alternate" type="application/rss+xml" title="" href=""/>
<link rel="icon" href="protected/images/carrot.png" type="image/png"/>
 
<script src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.1/mootools-yui-compressed.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="protected/js/jquery.parallaxscroll.js" type="text/javascript"></script>
<script src="protected/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="protected/js/login.js"></script>
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

</head>

<body>

<?php 
if(!(include 'protected/php/includes.php'))
{
	die('ERROR : file protected/php/includes.php does not exist.');
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
	

</body>
</html>