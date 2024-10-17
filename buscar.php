<?php
include("prohibirRetroceder.php");
include("verificarCredenciales.php");
include("header.php");
include("conexionBBDD.php");

?>
<form action="buscar.php" method="post">
    <label for="busca-contacto">Busca tu contacto:</label><br>
    <input type="search" name="busca-contacto" id="busca-contacto" placeholder="buscar.." >
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino_de_busqueda = $_POST['busca-contacto'];
    $sql = "SELECT nombre, apellidos, correo, telefono FROM guardarcontacto WHERE nombre LIKE '%$termino_de_busqueda%'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($fila = mysqli_fetch_assoc($result)) {
            echo "<p style=text-align:center;margin-top:1%;>".$fila['nombre']." | ".$fila['apellidos']." | ".$fila['correo']." | ".$fila['telefono'] . "</p><br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

include("footer.php");
?>