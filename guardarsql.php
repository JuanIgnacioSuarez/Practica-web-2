<?php
include('conexion.php');

$correo=addslashes(stripslashes($_POST['correo']));
$nombre=addslashes(stripslashes($_POST['nombre']));
$apellido=addslashes(stripslashes($_POST['apellido']));
$domicilio=addslashes(stripslashes($_POST['domicilio']));
$dispositivo=addslashes(stripslashes($_POST['dispositivo']));
$detalle=addslashes(stripslashes($_POST['problema']));




$query="INSERT INTO `tickets`(`correo`, `nombre`, `apellido`, `domicilio`, `dispositivo`, `detalle`) VALUES (?,?,?,?,?,?)";

$stmt=mysqli_prepare($conn,$query);

mysqli_stmt_bind_param($stmt,"ssssss",$correo,$nombre,$apellido,$domicilio,$dispositivo,$detalle);

$resultado=mysqli_stmt_execute($stmt);

if($resultado){
	echo "bien";
}
else{
	echo "mal";
}


$url="https://juan-suarez-default-rtdb.firebaseio.com/Clientes.json";

$datos=[
		'correo'=>$correo,
		'nroticket'=>0,
		'dipositivo'=>$dispositivo,
		'porcentaje'=>0,
		'detalle'=>'Nada'
];

$datos=json_encode($datos);
$ch=curl_init();

curl_setopt($ch , CURLOPT_URL,$url);
curl_setopt($ch , CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datos);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_exec($ch);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>