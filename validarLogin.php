<?php
$conexion = new mysqli("localhost","root","","movimientoyestabilidad");

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT * FROM alumnos WHERE correo='$correo'";
$result = $conexion->query($sql);

if($result->num_rows > 0){
    $fila = $result->fetch_assoc();
    if(password_verify($contraseña, $fila['contraseña'])){
        header("Location: ../menu.html");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Correo no registrado";
}
?>
