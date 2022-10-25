<?php
    require_once('../templates/header.php');

    $controlNotas = new ControlNotas();
    $rta = $controlNotas->listarTodo();
    if(array_key_exists('array', $rta)){
        //devolvio notas
        echo "<table class=\"tablita\" id=\"tablita\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Legajo</th>
                <th>Dni</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Mail</th>
                <th>Carrera</th>
                <th>Materia</th>
                <th>Nota</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($rta['array'] as $key => $value) {
            echo "<tr>";
            $id = $value->getId();
            echo "<td>$id</td>";
            $legajo = $value->getLegajo();
            echo "<td>$legajo</td>";
            $nombre = $value->getNombreApellido();
            echo "<td>$nombreApellido</td>";
            $materia = $value->getMateria();
            echo "<td>$materia</td>";
            $nota = $value->getNota();
            echo "<td>$nota</td>";
            echo "<td><a href=\"buscaId.php?id=$id\">Modificar</a>";
            echo "</tr>";
        }
        echo "</tbody>
        
        </table>
        <script src=\"../../Public/jsPuro/data.js\"></script>";
    }else{
        echo $rta['error'];
    }
?>

<link rel="stylesheet" href="../../Vendor/datatables/datatables/media/css/jquery.dataTables.min.css">
<script src="../../Vendor/datatables/datatables/media/js/jquery.dataTables.min.js"></script>

<?php
    require_once('../templates/footer.php');
?>