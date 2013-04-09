			<div class="legumes_box">
				<div class="category">
					<div class="category_title">
						<h6 style="margin-top:5px;">
							<a href="/">蔬菜</a>
						</h6>						
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
						<h6 style="margin-top:5px;">
							<a href=/>水果</a>
						</h6>						
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
					

<?php
/*
// On récupère tout le contenu de la table product_info
$reponse = $bdd->query('SELECT * FROM products_info');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
//$donnees = $reponse->fetch();
*/
$products = $productsManager->getFourProducts("fruit");
for($i=0; $i<4; $i++){
?>
				
			
						<div class="goods_item">
							<a href=/><img src=<?php echo $products[$i]->getPic_url() ?>></a>
							<p class="name">
								<a href=/ title="test"><?php echo $products[$i]->getName() ?></a>
								<br>
								规格：
								<font class="f1"><?php echo $products[$i]->getFormat() ?></font>
							</p>
							<p></p>
							<p>
								价格：
								<a href=/ class="shop">￥<?php echo $products[$i]->getPrice() ?>元</a>
							</p>
						</div> <!-- end of goods_item --> 
<?php
} // end of while
?>
					</div> <!-- end of goods_list -->
					<div class="hot_goods">
						to add
					</div> <!-- end of hot_goods -->
				</div> <!-- end of goods_info -->
			</div> <!-- end of fruits_box -->
			
			<div class="meet_box">
				<div class="category">
					<div class="category_title">
						<h6 style="margin-top:5px;">
							<a href="/">肉类</a>
						</h6>						
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