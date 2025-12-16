<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "movimientoyestabilidad");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$grado = $_POST['grado'];
$grupo = $_POST['grupo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Verificar si el correo ya existe
$verificar = "SELECT * FROM alumnos WHERE correo='$correo'";
$resultado = $conexion->query($verificar);

if ($resultado->num_rows > 0) {
    echo "<h2>⚠️ El correo ya está registrado. Intenta con otro.</h2>";
    echo "<a href='registro.html'>Volver al registro</a>";
} else {
    // Encriptar la contraseña antes de guardar
    $contraseña_segura = password_hash($contraseña, PASSWORD_DEFAULT);

    // Insertar datos
    $sql = "INSERT INTO alumnos (nombre, apellido, correo, contraseña, edad, genero, grado, grupo, telefono, direccion)
            VALUES ('$nombre', '$apellido', '$correo', '$contraseña_segura', '$edad', '$genero', '$grado', '$grupo', '$telefono', '$direccion')";

    if ($conexion->query($sql) === TRUE) {
        echo "<h2> Registro exitoso. Ya puedes iniciar sesión.</h2>";
        echo "<a href='index.html'>Ir al login</a>";
    } else {
        echo " Error al registrar: " . $conexion->error;
    }
}

$conexion->close();
?>
