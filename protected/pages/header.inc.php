
<script language="javascript">
$(function(){
	var loginUser = $('#loginUsername'),
		loginPsw = $('#loginPsw'),
		loginForm = $('#loginForm');
	//	login = $('#loginButton');

/*	loginPsw.on('click',function(){
		if (document.getElementById('loginBox').style.display == 'none') {
			document.getElementById('loginBox').style.display = 'block';
		} else {
			document.getElementById('loginBox').style.display == 'none';
		}
	});
		
	loginUser.blur(function(){
		if ($(this).val().length > 0) {
			loginUser.parent().removeClass('error').addClass('success');
		} else {
			loginUser.parent().removeClass('success').addClass('error');
		}
	});
	
	loginPsw.on('keydown input',function(){
		if ($(this).val().length > 0) {
			loginPsw.parent().removeClass('error').addClass('success');
		} else {
			loginPsw.parent().removeClass('success').addClass('error');
		}
	});  */
	
	loginForm.on('submit',function(e){
		if(loginUser.val().length > 0 && loginPsw.val().length > 0){
	
		} else {
			alert("请正确填写登陆信息。");
			e.preventDefault();		
		}
	});	 
	
});

</script>

	<header id="mainHeader">
		<div id="headerTop">
			<div id="mainMenu">
				<div id="branding">
					<span class="gbtcb"></span>
					<div class="logo">
						<strong>
							<a href="/" title="首页"></a>
						</strong>
					</div> <!-- end of logo -->
				<!--	<div class="tagline">健康生活</div> -->
				</div> <!-- end of branding -->
				<div id="loginContainer">
					<span class="gbtcb"></span>
					<ol class="headRightList">
<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
	//echo '你好'. $_SESSION["login"];
?>
<li class="listItem">
	<a href="/index.php?p=profile" id="loginUserName">
		<span class="listItemStyleTop"></span>
		<img src='/protected/images/icons/im.png' style="float:left; margin-top:9px; margin-right:2px">
		<span class="listItemStyle">
			<?php echo $_SESSION["login"] ?>
			<span class="flashDown"></span>
		</span>
	</a>
	<ul>
		<li><a href="#">个人信息</a></li>
		<li><a href="#">帐户管理</a></li>
		<li><a href="#">购买纪录</a></li>
		<li><a href="#">消息</a></li>
	</ul>
</li>
<li class="listItem">
	<a href="/index.php?p=logout" id="logout">
	<span class="listItemStyleTop"></span>
	<span class="listItemStyle">退出</span></a>
</li>
<?php
} else {
?>

	<li class="listItem">
		<a href="#" id="loginButton" class="headerLoginLink">
		<span class="listItemStyleTop"></span>
		<span class="listItemStyle">登陆</span>
		</a>
	</li>

    <div id="loginBox">                
                    	<form id="loginForm" method="post" action="/index.php?p=loginCheck">
                        	<fieldset id="loginBody">
                            	<fieldset class="login user">
                             	   <label for="loginUsername">用户名</label>
                                	<input type="text" name="loginUsername" id="loginUsername" />
	                            </fieldset>
    	                        <fieldset class="login password">
        	                        <label for="loginPsw">密码</label>
            	                    <input type="password" name="loginPsw" id="loginPsw" />
                	            </fieldset>
                    	        <input type="submit" id="login" value="登陆" />
                        	    <label class="checkPSW" for="checkbox"><input type="checkbox" id="checkbox" />记住登陆状态</label>
	                        </fieldset>
    	                    <span style="background:black"><a href="#" style="text-decoration:none">忘记密码？</a></span>
        	            </form>
            	    </div>
<!--    <span style="margin: 0 8px;">|</span> -->
    <li class="listItem">
		<a href="index.php?p=registre">
		<span class="listItemStyleTop"></span>
		<span class="listItemStyle">注册</span></a>
	</li>
<?php } ?>
		
	<li class="listItem">
		<a href="/index.php?p=shopping" id="showList"
				onmouseover="document.getElementById('shoppingList').style.display = 'block';
				document.getElementById('loginBox').style.display = 'none';"
				onmouseout="document.getElementById('shoppingList').style.display = 'none'";>
			<span class="listItemStyleTop" style="border-top-color:#dd4b39;"></span>
			<span class="listItemStyle">
				购物车(<span id="shoppingSum"><?php 	getOrdersQuantity();?></span>)
			</span>
		</a>

	</li>
</ol>

<!-- shopping cart -->
<div id="shoppingList" onmouseout="document.getElementById('shoppingList').style.display = 'none';"
		onmouseover="document.getElementById('shoppingList').style.display = 'block';"> 
		<div class="cartInfo">
			<div class="cartDetail">
				<div class="cartName">商品名称</div>
				<div class="cartPrice" style="text-align:center">单价</div>
				<span class="cartQuantity">数量</span>
				<br>
			</div>
		</div>
<?php echo getCartListHtml(); ?>
<!--		<div id="cartTotal"><span style="margin-left:25%;">您还没有选择任何商品</span></div>

		<div id="cartTotal"><span>总价:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="priceSum">0</span>&nbsp;元</span>
		<a href="#" id="goShopping">进入购物车</a></div> -->

<!--	<?php echo getCartListHtml();?>  -->
</div>

				</div> <!-- end of loginContainer -->

			</div> <!-- end of mainMenu -->
		</div> <!-- end of headerTop -->
	</header> 