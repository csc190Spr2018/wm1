<?php
	//return database connection
	function getDBConn(){
		$link = mysql_connect('localhost', 'root', 'goodyear123!@#');
		if (!$link) {
			throw new Exception("DB err: ".mysql_error());
		}
		mysql_select_db("testuname", $link);
		return $link;
	}

	//run query and return the result
	function query($q, $conn){
		$result = mysql_query($q, $conn);
		if(!$result){
			throw new Exception("query err: ".mysql_error());
		}
		return $result;
	}

	//pad single quotes if necessary
	function secure($val, $conn){
		return mysql_real_escape_string($val, $conn);
	}

	//return the checksum
	function myencrypt($value){
		return md5($value);
	}

	//add the pair
	function addPair($uname, $pwd){
		$conn = getDBConn();
		$uname = secure($uname, $conn);
		$pwd = secure(myencrypt($pwd), $conn);
		$q = "INSERT into users (uname, encpwd) VALUES ('$uname', '$pwd')";
		query($q, $conn);
	}

	function verifyPwd($uname, $pwd){
		//1. get the database connection
		$conn = getDBConn();
		$uname = secure($uname, $conn);
		//2. encode the pwd
		$pwd = secure(myencrypt($pwd), $conn);
		
		//3. verify (uname, encode_pwd exists)
		$q = "SELECT * FROM users WHERE uname='$uname' AND encpwd='$pwd'";
		$res = query($q, $conn);
		$row = mysql_fetch_assoc($res);
		if(!$row){
			return "no";
		}else{
			session_start();
			$_SESSION["uname"] = $uname;
			return "yes";
		}
	}
// -----  TEST MODE -----------
if(1==0){
	//addPair("stu2", "abc123");
	echo verifyPwd("stu2", "abc123");
}
?>
