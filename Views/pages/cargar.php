<?php
    require_once('../templates/header.php');
?>

<!-- JQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="container">
    <?php
    $controlNotas = new ControlNotas();
    if(!isset($_SESSION['user_id'])){
        //$materiaDada
        $arrayBusqueda = [];
        $mate = null;
    }else{
        $mate = $controlNotas->comprobarMateria($_SESSION['user_id']);
        if($mate != null){
            $arrayBusqueda['materia'] = $mate;
        }else{
            $arrayBusqueda = [];
        }
    }
    
    if( isset($_SESSION['user_id']) ): ?>
    <h3 class="d-flex justify-content-center m-3">Ingrese los datos a generar en un Excel</h3>
    <form action="../accion/accionCargar.php" method="GET">
        <div class="d-flex flex-row align-items-center mb-4">
            <div class="form-outline flex-fill mb-0">
                <table id="tabla" class="display table" cellspacing="0" width="100%">
                <thead>
                    <tr class="fila-fija">
                        <th>Apellido y Nombre</th>
                        <th>Legajo</th>
                        <th>Materia</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="apellidoNombre[]" id="apellidoNombre" class="form-control"/></td>
                        <td><input type="text" name="legajo[]" id="legajo" class="form-control"/></td>
                        <td><input type="text" name="materia[]" id="materia" class="form-control" readonly value="<?php echo $arrayBusqueda['materia']?>"/></td>
                        <td><input type="number" name="nota[]" id="nota" class="form-control" min="1" max="100" /></td>
                        <td class="eliminar"><button class="btn btn-danger">Eliminar</button></td>
                    </tr>
                </tbody>
                </table>

            <div class="d-flex justify-content-center m-4">
                <button class="btn btn-primary m-1" type="button" name="newAlumno" id="newAlumno">Insertar otro alumno</button>
                <button class="btn btn-success m-1" type="submit" name="submit" id="submit">Cargar</button>
                <a href="../pages/cargarExcel.php" class="btn btn-secondary m-1" type="button">Cargar excel</a>
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-center">
    </div>
</div>

<div class="m-5"></div>
<?php else: ?>
    <h3 class="d-flex justify-content-center">No posee permisos para realizar esta acción!</h3>
<?php endif; ?>
</div>

<!-- Lógica de jQuery para inserción múltiple -->
<script>
    $(function(){
        $("#newAlumno").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });

        $(document).on("click", ".eliminar", function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>

<?php
    require_once('../templates/footer.php');
?>