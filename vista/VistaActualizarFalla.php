<?php


include ("../controlador/ControladorFallas.php");

require 'base/cabecera.php';
$vistaActiva = 'VistaActualizarFalla';
require 'base/menu.php';

// Comprobamos si se ha proporcionado el parámetro 'txtID' en la solicitud GET
if (!isset($_GET['txtID']) || empty($_GET['txtID'])) {
    die('Error: El parámetro "txtID" es obligatorio.');
}
$txtID = $_GET['txtID'];


// Definimos y configuramos la conexión a la base de datos (suponiendo que ya lo has hecho antes de este fragmento de código)
$bd = new PDO('mysql:host=localhost;dbname=fallas_valencia', 'byron', '12345678');
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = "SELECT * FROM fallas WHERE id_falla = :id";
    $sentencia = $bd->prepare($sql);
    $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_OBJ);

    if ($registro === false) {
        die('Error: No se encontró ningún registro con el ID proporcionado.');
    }

    $nombre = $registro->nombre;
    $fecha_fundacion = $registro->fecha_fundacion;
    $presupuesto = $registro->presupuesto;

    // Aquí puedes agregar el código para mostrar los datos o procesarlos como desees
    ?>
    <table class="table">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha Fundacion</th>
            <th scope="col">Presupuesto</th>
        </tr>

        <tr>
            <td><?php echo $nombre; ?></td>

            <td><?php echo $nombre; ?></td>
        
            <td><?php echo $fecha_fundacion; ?></td>
        
            <td><?php echo $presupuesto; ?></td>
        </tr>

    </table>

    <form action="actualizarFalla.php" method="post">


        <input type="hidden" name="id_falla" value="<?php echo isset($_GET['txtID']) ? $_GET['txtID'] : ''; ?>">


        <label for="nombre">Nombre:</label>

        <input type="text" name="nombre" id="nombre" value="<?php echo $fila["nombre"]; ?>" required>


        <br><br>


        <label for="fecha_fundacion">Fecha de Fundación:</label>

        <input type="date" name="fecha_fundacion" id="fecha_fundacion" value="<?php echo $fila["fecha_fundacion"]; ?>" required>


        <br><br>


        <label for="presupuesto">Presupuesto:</label>

        <input type="number" name="presupuesto" id="presupuesto" value="<?php echo $fila["presupuesto"]; ?>" required>


        <br><br>


        <input type="submit" value="Actualizar Registro">


    </form>
    <?php

} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}

