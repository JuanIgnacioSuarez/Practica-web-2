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
<header><h1>Logearse</h1>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Generar un ticket</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="login.php">Logearse</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Estados de los envios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php">Envios</a>
  </li>
</ul>
</header>

<section>
	<h2>Iniciar sesion</h2>

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

<section class="enfila">
	
	<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="captcha" class="col-form-label">Captcha</label>
  </div>
  <div class="col-auto">
    <input type="text" id="captcha" name="captcha" class="form-control" aria-describedby="passwordHelpInline">
    <button type="button" id="iniciar" name="iniciar" class="btn btn-success">Iniciar sesion</button>
  </div>
</div>
<img src="captcha.php">
</section>
</section>

<footer>Derechos reservados-Partes informaticas</footer>

</body>
</html>



<script>
	$(document).ready(function(){
		$('#iniciar').click(function(){
			let correo=$('#correo').val();
			let contra=$('#contra').val();
			let captcha=$('#captcha').val();

		if(correo=="" || contra=="" || captcha ==""){
			alert("Ingrese datos en todos los campos");
		}
		else{
			$.post('vercaptcha.php',{captcha:captcha,correo:correo},function(data){
				if(data==="mal"){
					alert("Captcha incorrecto :C");
				}
				else{
					firebase.auth().signInWithEmailAndPassword(correo,contra)
					.then((userCredential)=>{
						alert("Inicio exitoso , redirijiendo..");
						$.post('derechos.php',{},function(data){
							if(data=== "admin"){
								window.location.href="admin.php";
							}
							else{
								window.location.href="detalle.php";
							}
						});
					})
					.catch((error)=>{
						alert("Error ,datos incorrectos");
					});
				}
			});
		}
		});
});
</script>