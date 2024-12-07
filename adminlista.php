<?php

include('conexion.php');

if($_POST['correo']==""){
$query="SELECT * FROM `tickets` ";
$stmt=mysqli_prepare($conn,$query);
}
else{
 $query="SELECT * FROM `tickets` WHERE id=?";
$stmt=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($stmt,"i",$_POST['correo']);
}
mysqli_stmt_execute($stmt);

$resultado=mysqli_stmt_get_result($stmt);




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
    </tr>
  </thead>
  <tbody>';



while($aux=mysqli_fetch_array($resultado)){
 echo  '<tr>
      <th scope="row">'.$aux['id'].'</th>
      <td>'.$aux['correo'].'</td>
      <td>'.$aux['nombre'].'</td>
      <td>'.$aux['apellido'].'</td>
      <td>'.$aux['domicilio'].'</td>
      <td>'.$aux['dispositivo'].'</td>
      <td>'.$aux['detalle'].'</td>
      <td><button type="button" class="btn btn-primary agregar" data-correo="'.$aux['correo'].'" data-nombre="'.$aux['nombre'].'" data-apellido="'.$aux['apellido'].'" data-domicilio="'.$aux['domicilio'].'" data-dispositivo="'.$aux['dispositivo'].'" data-detalle="'.$aux['detalle'].'" data-id="'.$aux['id'].'">Agregar detalles</button></td>
    </tr>';
}

 echo '</tbody>
</table>';
?>