
<?php

if (login()){
?>
<script type="text/javascript">
setTimeout(function () {
   window.location.href=document.referrer;//'javascript:history.go(-1)'; // the redirect goes here
},5000);
</script>

<h2>欢迎回来！</h2>
<!--  this doesn's work on safari
<p>浏览器将在5秒钟之后自动跳转到登陆前页面，或者请<a href="javascript:history.go(-1)" style="color:red">点击这里</a>！</p>
-->
<p>浏览器将在5秒钟之后自动跳转到登陆前页面，或者请<a href="#" onclick="window.location.href=document.referrer; return false;" style="color:red">点击这里</a>！</p>

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
