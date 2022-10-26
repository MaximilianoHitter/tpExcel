<?php
    require_once('../templates/header.php');
    $controlNotas = new ControlNotas();
    //$data = $controlNotas->getDatos();
    //var_dump($data);
    $bandera = false;
    /* if( $controlNotas->modificacion($data['GET']) ){
        $bandera = true;
    } */
    $rta = $controlNotas->modificacionCopada();
    if($rta['respuesta']){
        $bandera = true;
        //echo "gut gut";
    }else{
        //echo "not gut";
    }
?>

<?php if( $bandera ){ ?>
    <div class="container">
    <div class="alert alert-success m-3 d-flex justify-content-center" role="alert">
        Nota modificada!
    </div>
    </div>
        
<?php } else { ?>
    <div class="container">
    <div class="alert alert-danger m-3 d-flex justify-content-center" role="alert">
        No se pudo cambiar! Verifique que el legajo exista en el registro.
    </div>
    </div>
       
<?php } ?>

<?php
    require_once('../templates/footer.php');
?>