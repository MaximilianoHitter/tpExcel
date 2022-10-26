<?php
    require_once('../templates/header.php');
    $controlNotas = new ControlNotas();
    $data = $controlNotas->getDatos();
    var_dump($data);
    $bandera = false;

    if( $controlNotas->modificacion($data['GET']) ){
        $bandera = true;
    }
?>

<?php if( $bandera ){ ?>
    <div class="alert alert-success m-3" role="alert">
        Dueño modificado!
    </div>
        
<?php } else { ?>
    <div class="alert alert-danger m-3" role="alert">
        No se pudo cambiar! Verifique que el legajo exista en el registro.
    </div>
       
<?php } ?>

<?php
    require_once('../templates/footer.php');
?>