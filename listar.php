<?php
session_start();
include('conexion.php');

if($_POST['id']==""){
	$query="SELECT * FROM `tickets` WHERE correo=?";
	$stmt=mysqli_prepare($conn,$query);
	mysqli_stmt_bind_param($stmt,"s",$_SESSION['logeado']);
}
else{
	$query="SELECT * FROM `tickets` WHERE id=? AND correo=?";
	$stmt=mysqli_prepare($conn,$query);
	mysqli_stmt_bind_param($stmt,"is",$_POST['id'],$_SESSION['logeado']);
}

mysqli_stmt_execute($stmt);

$resultado=mysqli_stmt_get_result($stmt);


$url="https://juan-suarez-default-rtdb.firebaseio.com/Clientes.json";


$ch=curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);


$result=curl_exec($ch);

$result=json_decode($result,true);

$porcentaje=0;
$detalle="nada aun";
$codigooca="nada aun";

foreach ($result as $key => $value) {
	if($value['correo']==$_SESSION['logeado']){
		$porcentaje=$value['porcentaje'];
		$detalle=$value['detalle'];
		$codigooca=$key;
	}
}


echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Correo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Domicilio</th>
      <th scope="col">Dispositivo</th>
      <th scope="col">Detalle del desperfecto</th>
      <th scope="col">NRO de ticket</th>
      <th scope="col">Barra progreso</th>
      <th scope="col">NRO envio oca</th>
      <th scope="col">Dettale de reparacion o envio</th>
    </tr>
  </thead>
  <tbody>';


$porcentaje=number_format($porcentaje); /* Por mas que cambie el formato del numero , la barra del progreso no me lo toma*/
echo'porcentaje:'.$porcentaje.'';   /*Se muestra bien la variable*/
$i=0;
while($aux=mysqli_fetch_array($resultado)){


 echo  '<tr>
      <th scope="row">'.($i+1).'</th>
      <td>'.$aux['correo'].'</td>
      <td>'.$aux['nombre'].'</td>
      <td>'.$aux['apellido'].'</td>
      <td>'.$aux['domicilio'].'</td>
      <td>'.$aux['dispositivo'].'</td>
      <td>'.$aux['detalle'].'</td>
      <td>'.$aux['id'].'</td>
      <td><div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="'.$porcentaje.'" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar w-'.$porcentaje.'"></div>
	</div></td>
		<td>'.$codigooca.'</td>
		<td>'.$detalle.'</td>
    </tr>';
$i++;
}

 echo '</tbody>
</table>';
?>