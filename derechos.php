<?php
session_start();
if($_SESSION['logeado']=="admin@gmail.com"){
	echo "admin";
}
else{
	echo "usuario";
}
?>