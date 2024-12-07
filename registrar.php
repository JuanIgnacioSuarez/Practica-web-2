<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="misestilos.css">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-app.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-auth.js"></script>
    <script>      
        // Configuración de Firebase
         var firebaseConfig = {
             apiKey: "AIzaSyCd7vM2rsehlZMfn9vJ_EdEyfKcaNWrtBw",
 	 		authDomain: "juan-suarez.firebaseapp.com",
  			projectId: "juan-suarez",
  			storageBucket: "juan-suarez.firebasestorage.app",
  			messagingSenderId: "443506746690",
  			appId: "1:443506746690:web:7ec24cb38024f6189694db"
        };
        // Inicializar Firebase
   		 firebase.initializeApp(firebaseConfig);
        firebase.analytics();  
</script>
	<title></title>
</head>
<body>
<header><h1>Registrarse</h1>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Generar un ticket</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Logearse</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Estados de los envios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Envios</a>
  </li>
   <li class="nav-item">
    <a class="nav-link active" href="">Registrarse</a>
  </li>
</ul>
</header>

<section>
	<h2>Registrarse</h2>

	<div class="input-group mb-3">
	<span class="input-group-text" id="basic-addon2">Correo electronico</span>
  <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@gmail.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="contra" class="col-form-label">Contraseña</label>
  </div>
  <div class="col-auto">
    <input type="password" id="contra" name="contra" class="form-control" aria-describedby="passwordHelpInline">
  </div>
</div>

  <button type="button" id="crear" name="crear" class="btn btn-success">Crear</button>
</section>

<footer>Derechos reservados-Partes informaticas</footer>

</body>
</html>



<script>
	$(document).ready(function(){
		$('#crear').click(function(){
			let correo=$('#correo').val();
			let contra=$('#contra').val();
			

		if(correo=="" || contra==""){
			alert("Ingrese datos en todos los campos");
		}
		else{
				firebase.auth().createUserWithEmailAndPassword(correo,contra)
				.then((userCredential)=>{
					alert("Usuario creado con exito");
					window.location.href="login.php";
				})
				.catch((error)=>{
					alert("No se pudo crear el usuario");
				});
		}
		});
});
</script>