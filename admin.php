<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="misestilos.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Actualizar un envio</title>
</head>
<body>
<header><h1>Actualizar un envio</h1>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Generar un ticket</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Estados de los envios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="">Envios</a>
  </li>
</ul>
</header>

	<h2>Ver todos los tickets o buscar por id</h2>
<section class="enfila">
<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="correo" class="col-form-label">id:</label>
  </div>
  <div class="col-auto">
    <input type="text" id="correo" name="correo" class="form-control" aria-describedby="passwordHelpInline">
    <button type="button" id="buscar" name="buscar" class="btn btn-info">Buscar</button>
  </div>
</div>	

</section>
<div id="tabla"></div>
</section>

<footer>Derechos reservados partes informaticas</footer>

</body>
</html>



<script>
	
	$(document).ready(function(){
		$('#buscar').click(function(){
			let correo=$('#correo').val();
			$('#tabla').load('adminlista.php',{correo:correo});
		});

		$('#tabla').on('click','.agregar',function(){
			let correo=$(this).data('correo');
			let nombre=$(this).data('nombre');
			let apellido=$(this).data('apellido');
			let domicilio=$(this).data('domicilio');
			let dispositivo=$(this).data('dispositivo');
			let detalle=$(this).data('detalle');
			let id=$(this).data('id');

			$.post('guardarvariables.php',{correo:correo,nombre:nombre,apellido:apellido,domicilio:domicilio,dispositivo:dispositivo,detalle:detalle,id:id},function(){
				window.location.href="ingresardatos.php";
			});


		});

	});
</script>
