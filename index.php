<?php
include('db_conn.php');  //include db connection 將來可能會用到
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>welcome!</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<script language="javascript">
$(function(){
	$('#submit').mouseover(function(){$(this).css({'background':'black'})});
	$('#submit').mouseout(function(){$(this).css({'background':'#5A2626'})});
});

function userlogin(){
	<!--先取得欄位值-->
	var user_name = $('#user_name').val();
	var user_password = $('#user_password').val();
	<!--判斷有無正確填寫-->
	if(user_name=="" && user_password==""){
		$('#error_msg').text('Please enter your ID & password');
		return false;
	}
	if(user_name==""){
		$('#error_msg').text('Please enter your ID');
		$('#user_name').focus();
		return false;
	}else if(user_password==""){
		$('#error_msg').text('Please enter your password');
		$('#user_password').focus();
		return false;
	};
	//真正的ajax動作從這裡開始
	$.ajax({
		url:"login_chk.php",
		data:"user_name="+user_name+"&user_password="+user_password,
		type : "POST",
		beforeSend:function(){
			$('#loading_div').show(); 
			//beforeSend 發送請求之前會執行的函式
		},
		success:function(msg){
			if(msg =="success"){
				$('#login_showname').text('Welcome!'+user_name);
				$('#login_success').text('You have successfully login!');
				$('#login_success').fadeIn();
				$('#error_msg').hide();
				$('#user_login').hide(); 	
				$('#user_logout').fadeIn();
				//如果成功登入，就不需要再出現登入表單，而出現登出表單	
			}else
			{	
				$('#error_msg').show();
				$('#error_msg').html('Please Login again,<br/>沒有此用戶或密碼不正確');
			}
		},
		error:function(xhr){
			alert('Ajax request 發生錯誤');
		},
		complete:function(){
			$('#loading_div').hide();
			//$('#user_login').hide(); 		
			//complete請求完成實執行的函式，不管是success或是error
		}
	});	
};
function userlogout(){
	$.ajax({
		url:"logout.php",
		type : "POST",
		beforeSend:function(){
			$('#loadingout_div').show(); 
			$('#login_success').hide();
			$('#error_msg').text('Logout...please wait..');
			$('#user_logout').hide();
			//beforeSend 發送請求之前會執行的函式
		},
		success:function(msg){
			if(msg=="success"){
				$('#user_login').fadeIn(); 	
			}else
			{	
				$('#error_msg').html('請在登出一次');
			}
		},
		error:function(xhr){
			alert('Ajax request 發生錯誤');
		},
		complete:function(){
			$('#loadingout_div').hide();
			$('#user_login').fadeIn(); 	
		}
	});	
}
</script>
<div id="login_block">
	<form id="user_login" method="POST">
	<table id="login_table">
		<tr>
		  <td>
		   <label>ID:</label><input type="text" name="user_name" id="user_name"/><br/> 
		   <label>Password:</label><input type="password" name="user_password" id="user_password"/><br/>
		   <input type='button' id='submit' value='Login' onclick='userlogin();'/> 
		  </td>
		</tr>
	</table>
	</form>
	<div id="error_msg"></div>

	<form id="user_logout" method="POST" style="display:none;">
	<table id="login_table_out">
		<tr>
		  <td>
			<span id="login_showname">
			<!--放登入狀態-->
			</span>
		   <input type='button' id='submit2' value='Logout' onclick='userlogout();' />
		  </td>
		</tr>
	</table>
	</form>
	
	
	<div id="loading_div" style="display:none">
		<img src="ajax_loader.gif"><br/>Login...please wait
	</div>
	<div id="loadingout_div" style="display:none">
		<img src="ajax_loader.gif"><br/>Logout...please wait
	</div>
	<div id="login_success" style="display:none;">
	<!--放you are successfully login-->
	</div>
</div>
<div id="ft">win design it @ 2012 </div>
</body>
</html>