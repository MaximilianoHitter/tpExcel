<?php
    require_once('../templates/header.php')
?>

<section class="p-5">
    <div class="container py-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-md p-5">
                <i class='bi bi-upload d-flex justify-content-center'></i>
                <h3 class="d-flex justify-content-center">Cargar registro mediante archivo</h3>
                <form action="../accion/accionCargarExcel.php" method="POST" enctype="multipart/form-data">
                    <input class="form-control mb-4" type="file" name="archivo" id="archivo">
                    <button type="submit" class="btn btn-dark">Cargar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    require_once('../templates/footer.php')
?>