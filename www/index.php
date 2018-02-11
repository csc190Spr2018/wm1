 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
	function verifyPwd(){
		var uname = $("#txtUname").val();
		var pwd= $("#txtPwd").val();
		$.post( "servlets/verifyPwd.php", { uname: uname, pwd: pwd })
		  .done(function( data ) {
				var str = atob(data);
				var obj = JSON.parse(str);
				if(obj["ok"]!="ok"){
					alert("ERROR: " + obj["msg"]);
				}else{
					if(obj["auth"]=="yes"){
						alert("REDIRECT!");
						window.location = "inbox.php";
					}else{
						alert("pwd not right!");
					}
				}
		  });
	}
  </script>
</head>
<body>

<div class="container-fluid">
  <h1>Login</h1>
  <input type='text' id='txtUname' /> <br />
  <input type='password' id='txtPwd' /> <br />
  <button id='btnSubmit' onclick='verifyPwd()'>Login</button>
</div>

</body>
</html> 
