
<script language="javascript">
$(function(){
	var loginUser = $('#loginUsername'),
		loginPsw = $('#loginPsw'),
		loginForm = $('#loginForm'),
		logout = $('#logout');
		
/*	loginUser.blur(function(){
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
			// No. Prevent form submission
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
					<div class="logo">
						<strong>
							<a href="/" title="首页"></a>
						</strong>
					</div> <!-- end of logo -->
				<!--	<div class="tagline">健康生活</div> -->
				</div> <!-- end of branding -->
				<div id="loginContainer">
<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
	//echo '你好'. $_SESSION["login"];
?>
	<a href="/index.php?p=profile" id="loginUserName"><span><?php echo $_SESSION["login"] ?></span></a>
    <span style="margin: 0 8px;">|</span>
	<a href="/index.php?p=logout" id="logout" style="color:white"><span>退出</span></a>
<?php
} else {
?>
					<a href="#" id="loginButton"><span>登陆</span></a>
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
            	    <span style="margin: 0 8px;">|</span>
					<a href="index.php?p=registre" style="color:white"><span>注册</span></a>
<?php } ?>
		
		<span style="margin: 0 8px;">|</span>
		<a href="/index.php?p=cartTest" style="color:white" id="showList"
				onmouseover="document.getElementById('shoppingList').style.display = 'block';">
			购物车(<span id="shoppingSum"><?php $cart=Cart::getCart(); echo $cart->getOrderSum();?></span>)
		</a>


<!-- shopping cart -->
<div id="shoppingList" onmouseout="document.getElementById('shoppingList').style.display = 'none';">
<?php
	$cart=Cart::getCart();
	if($cart->getItemType() > 0) {
?>
	<p>总价是: <?php echo $cart->getSum(); ?></p>
<?php } else { ?>
	<p>您还没有选择任何商品</p>
<?php } ?>
</div>

				</div> <!-- end of loginContainer -->

			</div> <!-- end of mainMenu -->
		</div> <!-- end of headerTop -->
	</header> 