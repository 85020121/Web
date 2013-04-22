<?php
if (isset($_SESSION['id']) AND isset($_SESSION['login'])) {
	header("Location: /index.php"); /* Redirect browser */
	exit();

}
?>

<script language="javascript">

$(function(){
	
	var login = $("#username"),
		pass1 = $('#pass'),
		pass2 = $('#passChecker'),
		email = $('#email'),
		form = $('#registForm');
		
	// Empty the fields on load
	$('#registForm .row input').val('');
	
	login.blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("/protected/php/registration.php?jsCheck=isUsernameExist",{ user_name:$(this).val() } ,function(data)
        {
			if(data=='yes') {
				$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
				{ 
			  	//add message and change the class of the box and start fading
			  	$(this).html('<img src="/protected/images/icons/tick.png">').addClass('messageboxok').fadeTo(900,1);	
			  	login.parent().removeClass('error').addClass('success');
				});
			} else {
			  login.parent().removeClass('success').addClass('error');
			  if(data=='short') //if username not avaiable
			  {
		  		$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
				{ 
				  //add message and change the class of the box and start fading
				  $(this).html('* 用户名必须在6个字符以上').addClass('messageboxerror').fadeTo(900,1);
				});		
	          }
			  else if(data=='no') //if username not avaiable
			  {
		  		$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
				{ 
				  //add message and change the class of the box and start fading
				  $(this).html('* 此用户名已经存在，请重新输入').addClass('messageboxerror').fadeTo(900,1);
				});		
	          }
			  else if(data=='yes')
			  {
		  		$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
				{ 
				  //add message and change the class of the box and start fading
				  $(this).html('√').addClass('messageboxok').fadeTo(900,1);	
				  login.parent().removeClass('error').addClass('success');
				});
			  } else {
			  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
				{ 
				  //add message and change the class of the box and start fading
				  $(this).html(data).addClass('messageboxerror').fadeTo(900,1);	
				});
			  }
			}
				
	    });
 
	}); 

	// Handle form submissions
	form.on('submit',function(e){
		
		// Is everything entered correctly?
		if($('#registForm .row.success').length == $('#registForm .row').length){
//			$.post("/protected/php/registration.php?fn=regist", ,function(data){
//			});
		//	alert("Go submit.");
		}
		else{
			// No. Prevent form submission
			alert("请正确填写必填项的信息。");
			e.preventDefault();		
		}
	});
	
	// Validate the email field
/*	email.on('blur',function(){
		
		// Very simple validation
		if (!/^\S+@\S+\.\S+$/.test(email.val())){
			email.parent().removeClass('success').addClass('error');
		}
		else{
			email.parent().removeClass('error').addClass('success');
		}
		
	});  */
	
	// Validate the second password field
	pass2.on('keydown input',function(){
		
		// Make sure its value equals the first's
		if(pass2.val() == pass1.val()){
			pass1.parent()
					.removeClass('error')
					.addClass('success');							
			pass2.parent()
					.removeClass('error')
					.addClass('success');
		}
		else{
			pass2.parent()
					.removeClass('success')
					.addClass('error');
		} 
	});
	
});

function pwdStrength(password)
{
        var desc = new Array();
        desc[0] = "密码强度:很弱";
        desc[1] = "密码强度:弱";
        desc[2] = "密码强度:普通";
        desc[3] = "密码强度:普通";
        desc[4] = "密码强度:强";
        desc[5] = "密码强度:很强";
        var score   = 0;
        //if password bigger than 6 give 1 point
        if (password.length > 6) score++;
        //if password has both lower and uppercase characters give 1 point      
        if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
        //if password has at least one number give 1 point
        if (password.match(/\d+/)) score++;
        //if password has at least one special caracther give 1 point
        if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;
        //if password bigger than 12 give another 1 point
        if (password.length > 10) score++;
         document.getElementById("pwdDescription").innerHTML = desc[score];
         document.getElementById("pwdStrength").className = "strength" + score;
}

function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass');
    var pass2 = document.getElementById('passChecker');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
       // message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
      //  message.innerHTML = "Passwords Do Not Match!"
    }
}  

/*
//<!---------------------------------+
//  Developed by Roshan Bhattarai 
//  Visit http://roshanbh.com.np for this script and more.
//  This notice MUST stay intact for legal use
// --------------------------------->
$(document).ready(function()
{
	$("#username").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("/protected/php/registration.php?fn=isUsernameExist",{ user_name:$(this).val() } ,function(data)
        {
		  if(data=='short') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('* 用户名必须在6个字符以上').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('* 此用户名已经存在，请重新输入').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else if(data=='yes')
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('√').addClass('messageboxok').fadeTo(900,1);	
			});
		  } else {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html(data).addClass('messageboxerror').fadeTo(900,1);	
			});
		  }
				
        });
 
	});
}); */
</script>


<form action="/index.php?p=registOk" method="post" class="register" id="registForm">
            <h1>注册</h1>
            <fieldset class="row1">
                <legend>帐户信息 (必填)</legend>
                <p class="row username">
                    <label>用户名 </label>
                    <input name="username" id="username" type="text"/>
                    <span id="msgbox" style="display:none"></span>
                </p>
                <p class="email">
                    <label>邮箱 </label>
                    <input type="text" name="email" id="email"/>
                </p>
                <p class="row pass">
                    <label>密码 </label>
                    <input type="password" name="pass" id="pass" onkeyup="pwdStrength(this.value)"/>
                    <b id="pwdDescription" style="color: red""> </b>                	
                </p>
                <p class="row pass">
                    <label>重复密码 </label>
                    <input type="password" name="passChecker" id="passChecker" onkeyup="checkPass(); return false;"/>
                 <!--   <span id="confirmMessage" class="confirmMessage"></span> -->
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
   <!--             <p>
                    <label class="optional">国家 *
                    </label>
                    <select>
                        <option>
                        </option>
                        <option value="1">中国
                        </option>
                    </select>
                </p>  -->
            </fieldset>
            <fieldset class="row3">
                <legend>其他信息
                </legend>
                <p>
                    <label>性别 :</label>
                    <input type="radio" name="gender" id="gender" value="男"/>
                    <label class="gender">男</label>
                    <input type="radio" name="gender" id="gender" value="女"/>
                    <label class="gender">女</label>
                </p>
                <p>
                    <label>生日 :
                    </label>
                    <select class="date">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select>
                        <option value="1">一月
                        </option>
                        <option value="2">二月
                        </option>
                        <option value="3">三月
                        </option>
                        <option value="4">四月
                        </option>
                        <option value="5">五月
                        </option>
                        <option value="6">六月
                        </option>
                        <option value="7">七月
                        </option>
                        <option value="8">八月
                        </option>
                        <option value="9">九月
                        </option>
                        <option value="10">十月
                        </option>
                        <option value="11">十一月
                        </option>
                        <option value="12">十二月
                        </option>
                    </select>
                    <input class="year" type="text" size="4" maxlength="4"/>例: 1976
                </p>
      <!--          <p>
                    <label>Nationality *
                    </label>
                    <select>
                        <option value="0">
                        </option>
                        <option value="1">United States
                        </option>
                    </select>
                </p>
                <p>
                    <label>Children *
                    </label>
                    <input type="checkbox" value="" />
                </p> -->
                <div class="infobox"><h4>Helpful Information</h4>
                    <p>Here comes some explaining text, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>Allow partners to send me personalized offers and related services</label>
                </p>
            </fieldset>
            <div><button type="submit" class="button">注册 &raquo;</button></div>
</form>