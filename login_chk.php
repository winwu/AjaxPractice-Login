<?php
session_start();
/* -------------------------- */
/* Check username & password  */
/* -------------------------- */
include('db_conn.php');
sleep(1); 
$userid = isset($_POST["user_name"]) ? $_POST["user_name"] : $_GET["user_name"]; 
$password = isset($_POST["user_password"]) ? $_POST["user_password"] : $_GET["user_password"]; 
$sql = 'SELECT * FROM user WHERE userid = "'.$userid.'" and password="'.$password.'"';
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$record_count = mysql_num_rows($result); 
if($record_count<1){
//無資料回傳no data
	echo 'no data';
}else{
//若有這筆資料則回傳success
	$_SESSION['user_name'] = $userid;
	echo 'success';
	//echo $row['first_name'].$row['last_name'];    for debug use
} 
?>