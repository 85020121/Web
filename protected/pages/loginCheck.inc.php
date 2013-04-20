
<?php

if (login()){
?>
<script type="text/javascript">
setTimeout(function () {
   window.location.href='javascript:history.back()'; // the redirect goes here
},5000);
</script>

<h2>欢迎回来！</h2>
<p>浏览器将在5秒钟之后自动跳转到登陆前页面，或者请<a href="javascript:history.back()" style="color:red">点击这里</a>！</p>

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
