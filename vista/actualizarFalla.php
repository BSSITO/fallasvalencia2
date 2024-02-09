<?php
include ("../controlador/ControladorFallas.php");

$falla = new Falla();

$lista_fallas = $falla->getFallas();

require 'base/cabecera.php';
$vistaActiva = 'VistaActualizarFalla';
require 'base/menu.php';


$bd = new PDO('mysql:host=localhost;dbname=fallas_valencia', 'byron', '12345678');
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los valores del formulario
    $id_falla = $_POST["id_falla"];
    $nombre = $_POST["nombre"];
    $fecha_fundacion = $_POST["fecha_fundacion"];
    $presupuesto = $_POST["presupuesto"];

    // Crear una consulta SQL para actualizar los datos
    $consulta = "UPDATE fallas SET nombre = '$nombre', fecha_fundacion = '$fecha_fundacion', presupuesto = '$presupuesto' WHERE id_falla = '$id_falla'";

    // Ejecutar la consulta SQL
    if ($bd->query($consulta)) {
        echo "Registro actualizado con éxito.";
    } else {
        echo "Error al actualizar el registro: " .$bd->errorInfo();
    }
    ?>
    <a name="" id="" class="btn btn-info" href="../actualizar.php" style="margin-left:30px" role='button'>Volver</a>
    <?php
    // Cerrar la conexión a la base de datos
    $bd = null;
}

?>