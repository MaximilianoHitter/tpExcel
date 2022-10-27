<?php
    require_once( '../templates/header.php' );
    require_once('../../Vendor/autoload.php');
    $controlNotas = new ControlNotas();
    if( !isset($_SESSION['user_id']) ){
        //$materiaDada
        $arrayBusqueda = [];
        $mate = null;
    } else {
        $mate = $controlNotas->comprobarMateria( $_SESSION['user_id'] );
        if( $mate != null ){
            $arrayBusqueda['materia'] = $mate;
        } else {
            $arrayBusqueda = [];
        }
    }
    //var_dump($mate);
    
    $listado = $controlNotas->listarTodo($arrayBusqueda);
    // no funca todavia
?>

<div class="container">
<?php    
    $rta = $listado;
    if( array_key_exists('error', $rta) ){
        //$rta = $listado['error'];
        //echo $rta['error'];
    } else {
        if( isset($mate) OR $mate != null ){
           $accion1 = "<th></th>";
           $accion2 = "<th></th>";
        } else {
            $accion1 = '';
            $accion2 = '';
        }
        echo "<table class=\"tablita\" id=\"tablita\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Legajo</th>
                <th>Apellido y Nombre</th>
                <th>Materia</th>
                <th>Nota</th>
                $accion1
                $accion2
            </tr>
        </thead>
        <tbody>";
        foreach( $rta['array'] as $key => $value ){
            echo "<tr>";
            $id = $value->getId();
            echo "<td>$id</td>";
            $legajo = $value->getLegajo();
            echo "<td>$legajo</td>";
            $nombre = $value->getApellidoNombre();
            echo "<td>$nombre</td>";
            $materia = $value->getMateria();
            echo "<td>$materia</td>";
            $nota = $value->getNota();
            echo "<td>$nota</td>";
            if( $accion1 != '' ){
                echo "<td><a href=\"modificar.php?id=$id\"><button class=\"btn btn-primary m-1\">Modificar</button></a>";
                //echo "<td><a href=\"modificar.php?id=$id\">Modificar</a>";
                echo "<td><a href=\"borrar.php?id=$id\"><button class=\"btn btn-danger m-1\">Eliminar</button></a>";
                //echo "<td><a href=\"borrar.php?id=$id\">Eliminar</a>";
                echo "</tr>";
            }          
        }
        echo "</tbody>
        
        </table>
        <script src=\"../../Public/jsPuro/data.js\"></script>";
    }
    if( isset($listado['array']) ){
        $controlExcel = new ControlExcel();
        $ruta = $controlExcel->genera( $listado );
        echo "<div class=\"container\"><div class=\"alert alert-success text-center\" role=\"alert\"><a href=\"$ruta\" id=\"botoncito\" download=\"listado.xlsx\">Descargue todo el listado</a></div></div>";
    } else {
        echo "<div class=\"container\"><div class=\"alert alert-danger text-center m-4\" role=\"alert\">Actualmente no se poseen registros.</div></div>";
    }
?>
<!-- <h3 class="d-flex justify-content-center m-4">Seleccione el archivo que desea leer</h3>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <img src="../../Public/img/excel-png.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Excel subido por profe</h5>
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat perferendis corporis quae soluta eos quisquam ipsa sequi deserunt, ipsam officia!</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="../../Public/img/excel-png.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Excel subido por profe</h5>
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat perferendis corporis quae soluta eos quisquam ipsa sequi deserunt, ipsam officia!</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="../../Public/img/excel-png.png" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Excel subido por profe</h5>
                    <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat perferendis corporis quae soluta eos quisquam ipsa sequi deserunt, ipsam officia!</p>
                </div>
            </div>
        </div>
    </div>

    <section class="p-5">
        <div class="container py-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-md p-5">
                    <i class='bi bi-upload'></i>
                    <h3>Leer documento desde la computadora</h3>
                    <form action="../accion/accionVer.php" method="POST" enctype="multipart/form-data">
                        <input class="form-control mb-4" type="file" name="archivo" id="archivo">
                        <button type="submit" class="btn btn-dark">Buscar archivo</button>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

</div>

<?php
    require_once( '../templates/footer.php' );
?>