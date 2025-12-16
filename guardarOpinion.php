<?php
$conexion = new mysqli("localhost","root","","movimientoyestabilidad");
$correo = $_POST['correo'];
$opinion = $_POST['opinion'];

$sql = "INSERT INTO opiniones (correo, opinion) VALUES ('$correo', '$opinion')";
if($conexion->query($sql) === TRUE){
    echo "Opinión enviada correctamente";
} else {
    echo "Error: " . $conexion->error;
}
?>
