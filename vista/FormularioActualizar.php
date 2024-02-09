
<?php
include ("controlador/ControladorFallas.php");

$falla = new Falla();

$lista_fallas = $falla->getFallas();

require 'base/cabecera.php';
$vistaActiva = 'VistaActualizarFalla';
require 'base/menu.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha Fundacion</th>
      <th scope="col">Presupuesto</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach ($lista_fallas as $registro) {?>
    <tr class="">
      <td ><?php echo $registro['id_falla'] ?></td>
      <td><?php echo $registro['nombre'] ?></td>
      <td><?php echo $registro['fecha_fundacion'] ?></td>
      <td><?php echo $registro['presupuesto'] ?></td>
      <td>
        <a name="" id="" class="btn btn-info" href="vista/VistaActualizarFalla.php?txtID=<?php echo $registro['id_falla']?>" role='button'>Editar</a>
      </td>
    </tr><?php } ?>
  </tbody>

</table>
</body>
</html>