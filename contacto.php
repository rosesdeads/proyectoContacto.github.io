<?php
include("prohibirRetroceder.php");
include("verificarCredenciales.php");
include("header.php");
include("conexionBBDD.php");
?>
<style>
    table{
        position: relative;
        margin:0 auto;
        width: 60%;
        
    }

    table th{
        background-color: color:  rgb(84, 84, 206);
        color:white;
    }

    table,tr,th{
          border:1px solid black;
          border-collapse:collapse;
          padding:1%;
    }

    table td{
        padding:1%;
        text-align:center;
    }

    p{
        text-align:center;
    }

</style>
  
</div>

<!-- mostrar_contactos.php -->
<?php

// Crear la consulta SQL para obtener los contactos
$sql = "SELECT nombre, apellidos, correo, telefono FROM guardarcontacto";
$result = mysqli_query($conexion, $sql);

// Mostrar los resultados
if (mysqli_num_rows($result) > 0) {
    echo "<table border=1>";
    echo " <tr><th>Nombre</th><th>Apellidos</th><th>Correo Electronico</th><th>Telefono</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . htmlspecialchars($row['nombre']) . "</td><td>" . htmlspecialchars($row['apellidos']) . "</td><td>" . htmlspecialchars($row['correo']) . "</td><td>" . htmlspecialchars($row['telefono']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay contactos almacenados.</p>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<?php
include("footer.php")
?>