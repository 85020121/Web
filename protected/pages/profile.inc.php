<?php  
if(!isset($_SESSION['personInfo']) && isset($_SESSION['id']))
	getPersonInfo($_SESSION['id']);
?>
<form action="/index.php?p=registOk" method="post" class="register" id="registForm">
            <h1><?php echo $_SESSION['personInfo']['login'] ?></h1>
            <fieldset class="row1">
                <legend>帐户信息 (必填)</legend>

                <p class="email">
                    <label>邮箱 </label>
                    <input type="text" name="email" id="email"/>
                </p>

            </fieldset>
            <fieldset class="row2">
                <legend>个人信息
                </legend>
                <p style="color:red; margin-left:20px;">
                   * 请填写真实信息，有助于送货上门服务
                </p>
                <p>
                    <label class="optional">姓名
                    </label>
                    <input type="text" name="name" id="name" class="long"/>
                </p>
                <p>
                    <label class="optional">手机
                    </label>
                    <input type="text" name="tel" id="tel"/>
                </p>
                <p>
                    <label class="optional">座机
                    </label>
                    <input type="text" name="fixe" id="fixe"/>
                </p>
                <p>
                    <label class="optional">门牌号
                    </label>
                    <input type="text" name="streetNum" id="streetNum" class="long"/>
                </p>
                <p>
                    <label class="optional">街道
                    </label>
                    <input type="text" name="street" id="street" class="long"/>
                </p>
                <p>
                    <label class="optional">城市
                    </label>
                    <input type="text" name="city" id="city" class="long"/>
                </p>
            </fieldset>

            <div><button type="submit" class="button">注册 &raquo;</button></div>
</form>