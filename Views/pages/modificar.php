<?php
    require_once('../templates/header.php');
    require_once('../../Vendor/autoload.php');

    $controlNotas = new ControlNotas();
    $rta = $controlNotas->buscarId();
    if($rta == false){
        header('Location: ../home/index.php');
    }else{
         //var_dump( $rta );
    //$rta = $controlNotas->listarTodo( $dataId );
    if( array_key_exists('array', $rta) ){
        // Devolvio notas!
        echo "<div class=\"container\">
        <h3 class=\"d-flex justify-content-center m-3\">Ingrese los datos a modificar</h3>
        <form action=\"../accion/accionModificar.php\" method=\"GET\">
        <div class=\"d-flex flex-row align-items-center mb-4\">
        <div class=\"form-outline flex-fill mb-0\">
            <table class=\"display table tablita\" id=\"tablita\">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Legajo</th>
                    <th>Apellido y Nombre</th>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <tr>";

        $id = $rta['array']->getId();
        echo "<td><input type=\"text\" name=\"id\" class=\"form-control\" readonly value=\"$id\"></td>";

        $legajo = $rta['array']->getLegajo();
        echo "<td><input type=\"text\" name=\"legajo\" class=\"form-control\" value=\"$legajo\"></td>";
            
        $nombre = $rta['array']->getApellidoNombre();
        echo "<td><input type=\"text\" name=\"apellidoNombre\" class=\"form-control\" value=\"$nombre\"></td>";
            
        $materia = $rta['array']->getMateria();
        echo "<td><input type=\"text\" name=\"materia\" class=\"form-control\" readonly value=\"$materia\"></td>";
            
        $nota = $rta['array']->getNota();
        echo "<td><input type=\"text\" name=\"nota\" class=\"form-control\" value=\"$nota\"></td>";
            
        //echo "<td><a href=\"buscaId.php?id=$id\">Modificar</a>";
        echo "</tr>";
        echo "</tbody>
        
        </table>
        <div class=\"d-flex justify-content-center m-4\">
            <button class=\"btn btn-success m-1\" type=\"submit\" name=\"submit\">Enviar</button>
        </div>
        </div></div></form></div>";
    } else {
        // No devuelve na
        echo $rta['error'];
    }
    }
   
?>

<!-- <script src="../../Public/jsPuro/data.js"></script> -->
<!-- <link rel="stylesheet" href="../../Vendor/datatables/datatables.min.css">
<script src="../../Vendor/datatables/datatables.min.js"></script>
 -->
<?php
    require_once('../templates/footer.php');
?>