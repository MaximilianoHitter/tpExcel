<?php
    require_once('../templates/header.php');
    $controlNotas = new ControlNotas();
    $rta = $controlNotas->buscarId();
    //var_dump($rta);
    if($rta == false){
        header('Location: ../home/index.php');
    }else{
        if( array_key_exists('array', $rta) ){
            $id = $rta['array']->getId();
            $legajo = $rta['array']->getLegajo();
            $nombre = $rta['array']->getApellidoNombre();
            $materia = $rta['array']->getMateria();
            $nota = $rta['array']->getNota(); ?>
            <div class="container">
                <form action="../accion/accionBorrar.php" method="GET">
                <table class="display table tablita" id="tablita">
                <h4 class="d-flex justify-content-center">Está seguro que desea eliminar el registro con los datos:</h4>
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
                    <tr>
                        <td><input type="number" name="id" readonly value="<?php echo $id ?>" class="form-control"></td>
                        <td><input type="text" name="legajo" readonly value="<?php echo $legajo ?>" class="form-control"></td>
                        <td><input type="text" name="apellidoNombre" readonly value="<?php echo $nombre ?>" class="form-control"></td>
                        <td><input type="text" name="materia" readonly value="<?php echo $materia ?>" class="form-control"></td>
                        <td><input type="number" name="nota" readonly value="<?php echo $nota ?>" class="form-control"></td>
                    </tr>
                </tbody>
                </table>
                </span>
        
                <div class="d-flex justify-content-center">
                    <a href="../pages/ver.php" type="button" class="btn btn-secondary m-2">No, volver atrás</a>
                    <button type="submit" class="btn btn-primary m-2">Si, estoy seguro</button>
                </div>
                </form>
            </div>
        <?php } else { 
            echo $rta['error'];
        }
    }


?>

<?php
    require_once('../templates/footer.php');
?>