<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="misestilos.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Detalle del envio</title>
</head>
<body>
<header><h1>Detalle de los tickets</h1>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Generar un ticket</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="login.php">Logearse</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="">Estados de los envios</a>
  </li>
</ul>
</header>

<section>
	<h2>Ingrese un id o deje vacio para ver todos los tickets</h2>
<section class="enfila">
<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="id" class="col-form-label">ID del ticket</label>
  </div>
  <div class="col-auto">
    <input type="text" id="id" name="id" class="form-control" aria-describedby="passwordHelpInline">
    <button type="button" id="buscar" name="buscar" class="btn btn-info">Buscar</button>
  </div>
</div>	
</section>

<div id="tabla"></div>

</section>

<footer>Derechos reservados a Partes informaticas</footer>

</body>
</html>


<script>
	$(document).ready(function(){
		$('#buscar').click(function(){
			let id=$('#id').val();
		
		$('#tabla').load('listar.php',{id:id});	
		});
	});
</script>