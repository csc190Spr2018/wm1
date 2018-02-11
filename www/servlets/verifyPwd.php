<?php
 $arrRet = array("ok"=>"ok", "msg"=>"none", "auth"=>"yes", "uname"=>$_POST["uname"]);
 echo(base64_encode(json_encode($arrRet)));
?>
