<?php
session_start();

$_SESSION['logeado']=$_POST['correo'];

if($_POST['captcha']!=$_SESSION['tmptxt']){
	echo "mal";
}
else{
	echo "bien";
}
?>