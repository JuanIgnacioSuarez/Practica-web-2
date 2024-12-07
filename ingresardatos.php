<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="misestilos.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Cargar los datos</title>
</head>
<body>
	<header><h1>Cargarle los datos a un ticket</h1>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#">Generar un ticket</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Estados de los envios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="admin.php">Envios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="">Actualizar datos</a>
  </li>

</ul>
</header>
<section>
	<h2>Ingrese los datos de este envio</h2>

<div class="input-group">
  <span class="input-group-text">Detalle del envio:</span>
  <textarea class="form-control" id="detalleenvio" name="detalleenvio" aria-label="With textarea"></textarea>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="porcentaje" class="col-form-label">Porcentaje del envio:</label>
  </div>
  <div class="col-auto">
    <input type="number" id="porcentaje" name="porcentaje" class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
    <span id="porcentaje" class="form-text">
     Menor a 100 y mayor a -1
    </span>
  </div>
</div>

<button type="button" id="cambiar" name="cambiar" class="btn btn-primary">Cambiar</button>

</section>

<footer>Derechos reservados a partes informaticas</footer>

</body>
</html>

<script>
	
	$(document).ready(function(){
		$('#cambiar').click(function(){
			let detalleenvio=$('#detalleenvio').val();
			let porcentaje=$('#porcentaje').val();

			if(porcentaje>100||porcentaje<0){
				alert("porcentaje erroneo");
			}
			else{
			$.post('cargarfirebase.php',{detalleenvio:detalleenvio,porcentaje:porcentaje},function(data){
				if(data==="bien"){
					alert("Datos cargados con exito!");
					window.location.href="admin.php";
				}
				else{
					alert("No se pudieron actualizar");
				}
			});
	}
		});

	});
</script>