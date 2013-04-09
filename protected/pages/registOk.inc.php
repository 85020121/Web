
<?php

if (registUser()){
//echo "user is ".$_SESSION['login']."  id is ".$_SESSION['id'];
?>
<script type="text/javascript">
setTimeout(function () {
   window.location.href='/'; // the redirect goes here
},5000);
</script>

<h2>注册成功！</h2>
<p>浏览器将在5秒钟之后自动跳转到网站首页，或者请<a href="/" style="color:red">点击这里</a>！</p>

<?php
} else {
?>
<script type="text/javascript">
setTimeout(function () {
   window.location.href='/index.php?p=registre'; // the redirect goes here
},5000);
</script>

<h2>Failed!!!!!!!!!!!</h2>
<p>You suck!!!!!!!!!!!!!</p>
<?php
}
?>
