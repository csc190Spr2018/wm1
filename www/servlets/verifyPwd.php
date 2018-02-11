<?php
	include_once("common.php");
	$arr = array("ok"=>"ok", "msg"=>"none", "auth"=>"no");
	try{
		//DEBUG USE TO REMOVE LATER --------
		$_POST["uname"] = "stu1";
		$_POST["pwd"] = "abc123";
		//DEBUG USE TO REMOVE LATER --------

		//1. get uname and pwd
		$uname= $_POST["uname"];
		$pwd = $_POST["pwd"];
		$arr["auth"] = verifyPwd($uname, $pwd);
	}catch(Excetion $exc){
		$arr["msg"] = $exc->getMessage();
	}
	echo(json_encode($arr));
?>
