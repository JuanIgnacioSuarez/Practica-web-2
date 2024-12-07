<?php

session_start();

$url="https://juan-suarez-default-rtdb.firebaseio.com/Clientes.json";

$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$respuesta=curl_exec($ch);

$respuesta=json_decode($respuesta,true);


foreach ($respuesta as $key => $value) {
    if($_SESSION['correocli']==$value['correo']){
        $llave=$key;        
    }
}

curl_close($ch);



$detalle=$_POST['detalleevnio'];
$url="https://juan-suarez-default-rtdb.firebaseio.com/Clientes/".$llave.".json";


$data = [
    'detalle'=>$detalle,                  /*Cuando guardo los datos , detalle se borra de firebase sin razon*/
    'porcentaje'=>$_POST['porcentaje']
];


$data = json_encode($data);

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);

curl_close($ch);

if($response){
    echo "bien";
}
else{
    echo "mal";
}
?>
