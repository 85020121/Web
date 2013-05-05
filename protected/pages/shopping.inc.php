<script type="text/javascript">
$(function(){
	// remove product from the shopping list
    $('.product-remove').click(function() {
    	var li = $(this).closest('li');
    	//li.find('.item-overlay').css('z-index','2');
    	li.find('.item-overlay').css('z-index','2').animate({opacity:['1', 'swing']},3000, 'linear', function()
		{
			// to add
			
			$(this).closest('li').slideUp("normal", function() { $(this).remove(); } );
		});
  
		return false;
    });
    
    var lastQuantity;
    var lastOrdersSum;
    var lastOrderTotal;
    var bubble = $('#coherent_bubble_node');
    $('.quantityInput').click(function(){
	   	lastQuantity = parseInt($(this).val());
	   	
    }).change(function(){
    	var newQuantity = parseInt($(this).val());
		//console.log('value is '+lastQuantity+' and new is '+newQuantity);
    	if (isNaN(newQuantity)){
    		$(this).val(lastQuantity);
    		return false;
    	}
    	if (newQuantity <=0 || newQuantity > 999) {
   		   	var offset = $(this).offset();
			bubble.find('.bubbleContent').html('<span class="bubbleContentStyle">请输入1到999之间的数字</span>');
			var bubbleLeft = offset.left - bubble.width()/2 - 10 + $(this).width()/2;
			var bubbleTop = offset.top - $(this).height() - bubble.height() - 22; // arrow height is 16
			bubble.css({opacity:1, left:bubbleLeft, top:bubbleTop});
			window.location.href='#';
    	} else {
    		bubble.css({opacity:0});
    		$(this).val(newQuantity);
    		var father = $(this).closest('ul');
			var price = father.find('.orderPrice').html()*1;
			var orderTotal = father.find('.orderTotal');
    		
			lastOrdersSum = $('#ordersSum').html() * 1;
			lastOrderTotal = orderTotal.html() * 1;
			
			$.post("/protected/php/shopping.php?&jsAction=updateQuantity", 
				{id:parseInt(father.children('.orderID').html()), quantity:newQuantity}, 
				function(data){}).done(function() { 
		    		orderTotal.html((price*newQuantity).toFixed(2));
    				$('#ordersSum').html((lastOrdersSum - lastOrderTotal + price*newQuantity).toFixed(2));
				}).fail(function(){
					alert("修改失败，请稍后再试。");
				});

    	}
    });
	
});
</script>


<div id="cart-wrapper" class="page-content clearfix">
	<div id="customer-cart">
		<div class="cart-box">
		<h1 class="head	ing primary">购物清单</h1>
		<div id="cart-products">
		<ul id="cart-product-list" class="cart-product-list">
<!--			<li class="cart-product clearfix top-divided">
				<div class="product-container">
					<div class="item-overlay">
						<p class="h2">
							<span class="removed">从购物车中删除此件物品</span>
						</p>
					</div>
					<div class="media-block">
						<div class="media product-image">
							<img src="/protected/images/130/fruits/lemon.jpg" alt>
						</div>
						<div class="content product-info pvm">
							<div class="media-block alt clearfix">
								<ul class="media h-list alt price-quantity">
									<li class="item first product-format">
										<span class="a11y">规格&nbsp;:</span>
										500 g
									</li>									
									<li class="item first product-price">
										<span class="a11y">单价&nbsp;:</span>
										10 $
									</li>
									<li class="item phl quantity-select">
										<label class="a11y">数量</label>
										<input value type="number" length="3"  maxlength="4" class>
									</li>
									<li class="item quantity-price h4">
										<span class="a11y">总价&nbsp;:</span>
										<strong>10 $</strong>
									</li>
								</ul>
								<div class="product-title">
									<h2 clss="content h3 strong">
										<a href="" class="alt">Orange</a> 
									</h2>
								</div>
							</div> 
							<div class="shopping-product-admin section top-divided mbm">
								<p class="product-admin h-group">
									<a href="#" class="product-remove item">删除</a>
									<a href="#" class="product-remove item">收藏</a>
								</p>
							</div> 
						</div>
					</div>
				</div>
			</li> -->
		
<?php getCustomerShoppingList(); ?>

		</ul>
		<ul class="cart-product-list">
			<li class="cart-footer clearfix top-divided">
				<div class="totals-content media-block alt">
					<div id="purchase-totals" class="media">
						<table class="order-summary">
							<colgroup>
								<col class="label">
								<col class="value">
							</colgroup>
							<tbody>
								<tr class="line-shipping">
                                    <td class="label">
                                        <span id="shipping-label-free" class="text-alert" style="display: none;">Livraison gratuite</span>
										<span id="sidebar-summary-shipping-upsell" class="text-alert mbm" style="display: none;"></span>
                                    	<span id="shipping-label-notfree" class="label text-alert">到家</span>
                                	</td>
                                	<td id="cart-summary-shipping-cost" class="text-alert">0.00&nbsp元</td>
                            	</tr>
                            	<tr id="cart-summary-order-total" class="line-total h3 strong">
                                    <td class="label">总价</td>
                                	<td><span id="cart-summary-order-total-value"><span id="ordersSum"><?php getOrdersSum(); ?></span>&nbsp元</span></td>
                                </tr>
							</tbody>
						</table>
					</div>
				</div>
			</li>
		</ul>
	</div> <!-- end of cart-products -->
	<div class="cart-totals">
		<div class="totals-content media-block alt">
        	<p id="continue-shopping" class="clearfix">
                <a href="/" class="button rect secondary" onclick="s_objectID='1bc72ee82798405089d0387a8b6d1e22';">
                	<span>
                		<span class="continue-img"></span>
                		<span>继续购物</span>
                	</span>
                </a>
            </p>
			<div id="cart-actions">
                <button class="button rect transactional" id="checkout-now"><span>确认</span></button>                
            </div>
        </div>
	</div> <!-- end of cart-totals -->
	</div> <!-- end of cart-box -->
	</div> <!-- end of customer-cart -->
	
</div> <!-- end of cart-wrapper -->

<?php
//print_r($cart);

?>


