<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="misestilos.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Tickets</title>
</head>
<body>
<header><h1>Crear un ticket-Productos informaticos</h1>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Generar un ticket</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Estados de los envios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Envios</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="registrar.php">Registrarse</a>
  </li>
</ul>
</header>

<section>
	<h2>Generar un nuevo ticket</h2>
	<div class="input-group mb-3">
  <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@gmail.com" aria-label="Correo" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">usuario@gmail.com</span>
</div>

	<div class="input-group mb-3">
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" aria-label="Nombre:">
  <span class="input-group-text">Nombre y apellido</span>
  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" aria-label="Apellido:">
</div>

<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Domicilio:</span>
  <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="ejemplo 13456" aria-label="Username" aria-describedby="addon-wrapping">
</div>

<div class="input-group mb-3">
  <label class="input-group-text" for="dispositivo">Dispositivo</label>
  <select class="form-select" id="dispositivo" name="dispositivo">
    <option selected>Elija 1</option>
    <option value="computadora">Computadora</option>
    <option value="auricular">Auricular</option>
    <option value="telefono">Telefono</option>
  </select>
</div>


<div class="input-group">
  <span class="input-group-text">Detalle del desperfecto:</span>
  <textarea class="form-control" id="problema" name="problema" aria-label="With textarea"></textarea>
</div>


<button type="button" id="generar" name="generar" class="btn btn-primary">Generar ticket</button>
</section>


<footer>Derechos reservados a partes electronicas</footer>

</body>
</html>


<script>
	$(document).ready(function(){
		$('#generar').click(function(){
			let correo=$('#correo').val();
			let nombre=$('#nombre').val();
			let apellido=$('#apellido').val();
			let domicilio=$('#domicilio').val();
			let dispositivo=$('#dispositivo').val();
			let problema=$('#problema').val();

			if(correo ==""|| nombre=="" || apellido=="" || domicilio=="" || dispositivo=="" || problema==""){
				alert("Ingrese datos en todos los campos por favor");
			}
			else{
				$.post('guardarsql.php',{correo:correo,nombre:nombre,apellido:apellido,domicilio:domicilio,dispositivo:dispositivo,problema:problema},function(data){
					if(data ==="bien"){
						alert("Ticket generado con exito");
					}
					else{
						alert("No se pudo generar el ticket...");
					}
				});
			}
		});
	});
</script>