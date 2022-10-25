<?php
    require_once( '../templates/header.php' );
    require_once('../../Vendor/autoload.php');
    $controlNotas = new ControlNotas();
    if(!isset($_SESSION['user_id'])){
        //$materiaDada
        $arrayBusqueda = [];
    }else{
        $mate = $controlNotas->comprobarMateria($_SESSION['user_id']);
        if($mate != null){
            $arrayBusqueda['materia'] = $mate;
        }else{
            $arrayBusqueda = [];
        }
    }
    //var_dump($mate);
    
    
    $listado = $controlNotas->listarTodo($arrayBusqueda);
    // no funca todavia
?>

<div class="container">
    <?php
    var_dump($listado);
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