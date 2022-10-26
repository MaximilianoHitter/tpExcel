<?php
    require_once('../templates/header.php');
    $controlNota = new ControlNotas();
    $rta = $controlNota->buscarId();
    //var_dump($rta);

    if( $controlNota->baja($rta['array']) ){ ?>
    <div class="container">
        <div class="alert alert-success text-center" role="alert">El registro se ha eliminado con éxito!</div>
    </div>
<?php
    } else {
        echo $rta['error'];
    }
?>

<?php
    require_once('../templates/footer.php');
?>