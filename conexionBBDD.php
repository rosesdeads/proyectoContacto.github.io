<?php
//Definimos variables para realizar la conexion
$servidor = "localhost";
$usuario="root";
$contrasenia="";
$baseDatos="contactos";

//Definir variable conexion
$conexion= new mysqli($servidor,$usuario,$contrasenia,$baseDatos); //new mysqli: Este constructor se utiliza para crear una nueva conexión a una base de datos MySQL.
//-> (Operador de acceso a propiedades):En PHP, este operador se utiliza para acceder a propiedades y métodos de un objeto.
//En este caso, -> permite acceder a la propiedad connect_error del objeto $conexion, que es una instancia de la clase mysqli.
//connect_error:
//Es una propiedad de la clase mysqli que contiene un mensaje de error si la conexión a la base de datos falla.
//Si no hubo errores en el intento de conexión, esta propiedad almacenará una cadena vacía ("").
if ($conexion->connect_error) {
    //die("Conexión fallida: " . $conexion->connect_error);
    header("location:conexionError.php");
    exit();
}/*
if($_SERVER["REQUEST_METHOD"]=="POST"){
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$correo=$_POST["correo"];
$telefono=$_POST["telefono"];
//Limpiar datos para evitar inyecciones SQL (recomendado usar sentencias preparadas)
$nombre=mysqli_real_escape_string($conexion,$nombre);
$apellidos=mysqli_real_escape_string($conexion,$apellidos);
$correo=mysqli_real_escape_string($conexion,$correo);
$telefono=mysqli_real_escape_string($conexion,$telefono);
 // Crear la consulta SQL
 $sql="INSERT INTO guardarcontacto (nombre,apellidos,correo,telefono) VALUES ('$nombre','$apellidos','$correo','$telefono')";
// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
echo "<p style=text-align:center;>Nuevo registro creado exitosamente!!</p>";
} else {
$error = mysqli_error($conexion);
echo "<p style=text-align:center;>Error: $error</p><br>";}
}

mysqli_close($conexion);
//Cerrar la conexion*/

//echo "Conexión exitosa";
echo "<p style=color:white;> .</p> "
?>