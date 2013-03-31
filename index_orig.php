
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<title>放心菜</title>
<link rel="stylesheet" type="text/css" media="all" href="protected/css/default.css"/>
<meta name="description" content="放心菜，送到家"/>
<meta name="keywords" content="有机蔬菜，放心菜，荆门送菜到家，买菜网"/>
<link rel="alternate" type="application/rss+xml" title="" href=""/>
<link rel="icon" href="protected/images/carrot.png" type="image/png"/>
 
<script src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.1/mootools-yui-compressed.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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

</head>

<body>

	<header id="mainHeader">
		<div id="headerTop">
			<div id="mainMenu">
				<div id="branding">
					<div class="logo">
						<strong>
							<a href="/" title="首页"></a>
						</strong>
					</div> <!-- end of logo -->
				<!--	<div class="tagline">健康生活</div> -->
				</div> <!-- end of branding -->
			</div> <!-- end of mainMenu -->
		</div> <!-- end of headerTop -->
	</header> <!-- end of wrap-->

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=legumes;charset=UTF8', 'bowen', 'waiwai');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM products_info ORDER BY view_count DESC limit 0,2');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	if ($donnees['name']) { ?>
<h1><?php echo $donnees['name']; ?></h1>
<?php
	}
	else echo "nothing";
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
	
	<div id="body">
		<div class="wrap">
			<div class="legumes_box">
				<div class="category">
					<div class="category_title">
						<h4 style="margin-top:5px;">
							<a href=/>蔬菜</a>
						</h4>						
					</div>
				</div> <!-- end of category -->
				<div class="goods_info" style="margin-top:10px;">
					<div class="suggest">
						<ul>
							<a href=/>
								<img src="" width="200" height="230" border="0">
							</a>	
						</ul>
					</div> <!-- end of suggest -->
					<div class="goods_list">
						<div class="goods_item">
							<a href=/>pic 140X140</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
						<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
												<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
												<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
					</div> <!-- end of goods_list -->
					<div class="hot_goods">
						to add
					</div> <!-- end of hot_goods -->
				</div> <!-- end of goods_info -->
			</div> <!-- end of legumes_box -->
			
			<div class="fruits_box">
				<div class="category">
					<div class="category_title">
						<h4 style="margin-top:5px;">
							<a href=/>水果</a>
						</h4>						
					</div>
				</div> <!-- end of category -->
				<div class="goods_info" style="margin-top:10px;">
					<div class="suggest">
						<ul>
							<a href=/>
								<img src="" width="200" height="230" border="0">
							</a>	
						</ul>
					</div> <!-- end of suggest -->
					<div class="goods_list">
						<div class="goods_item">
							<a href=/>pic 140X140</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
						<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
												<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
												<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
					</div> <!-- end of goods_list -->
					<div class="hot_goods">
						to add
					</div> <!-- end of hot_goods -->
				</div> <!-- end of goods_info -->
			</div> <!-- end of fruits_box -->
			
			<div class="meet_box">
				<div class="category">
					<div class="category_title">
						<h4 style="margin-top:5px;">
							<a href=/>肉类</a>
						</h4>						
					</div>
				</div> <!-- end of category -->
				<div class="goods_info" style="margin-top:10px;">
					<div class="suggest">
						<ul>
							<a href=/>
								<img src="" width="200" height="230" border="0">
							</a>	
						</ul>
					</div> <!-- end of suggest -->
					<div class="goods_list">
						<div class="goods_item">
							<a href=/>pic 140X140</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
						<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
												<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
												<div class="goods_item">
							<a href=/>pic</a>
							<p class="name">
								<a href=/ title="test">test</a>
								"&nbsp;&nbsp;"
								<a href=/ title></a>
								<br>
								"规格："
								<font class="f1">...</font>
							</p>
							<p></p>
							<p>
								"价格："
								<a href=/ class="shop">￥...元</a>
							</p>
						</div> <!-- end of goods_item -->
					</div> <!-- end of goods_list -->
					<div class="hot_goods">
						to add
					</div> <!-- end of hot_goods -->
				</div> <!-- end of goods_info -->
			</div> <!-- end of meet_box -->
		</div> <!-- end of wrap -->
	</div> <!-- end of body -->
</body>
</html>