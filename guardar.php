<?php
include("prohibirRetroceder.php");
include("verificarCredenciales.php");
include("header.php");
include("conexionBBDD.php");

?>

<div class="main-guardar">
    <main>
    <form action="guardar.php" method="POST" onsubmit="return validar()">
        <h2>Guardar Contacto</h2> <br>
    <label for="nombre">Introduce tu nombre:</label><br>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
    <label for="apellido">Introduce tu apellido:</label><br>
    <input type="text" name="apellidos" id="apellidos" placeholder="Apellido"><br>
    <label for="correo">Introduce tu correo:</label><br>
    <input type="email" name="correo" id="correo" placeholder="Correo"><br>
    <label for="telefono">Introduce tu numero de telefono:</label><br>
    <input type="tel" name="telefono" id="telefono" placeholder="Telefono"><br>
    <input type="submit" value="Guardar contacto" onclick="validar()">
    </form>
    </main>
</div>

<?php
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
     $sql="INSERT INTO guardarcontacto (nombre,apellidos,correo,telefono,fecha) VALUES ('$nombre','$apellidos','$correo','$telefono',NOW())";
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    echo "<p style=text-align:center;margin-top:1%;>Nuevo registro creado exitosamente!!</p>";
} else {
    $error = mysqli_error($conexion);
    echo "<p style=text-align:center;>Error: $error</p><br>";
    //Cerrar la conexion
    mysqli_close($conexion);
    }}

include("footer.php");
?>