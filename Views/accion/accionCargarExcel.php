<?php
    require_once('../templates/header.php');

    use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $controlNotas = new ControlNotas();
    $controlExcel = new ControlExcel();
    $data = $controlExcel->getDatos();

    $dir = "../../Public/documents/profesorUpload/";
    $fileName = $_FILES['archivo']['name'];
    $fileTmp = $_FILES['archivo']['tmp_name'];
    $dirSubida = $dir . $fileName;

    move_uploaded_file( $fileTmp, $dirSubida );

    $documento = IOFactory::load( $dirSubida );
    $totalHojas = $documento->getSheetCount();

    $hojaActual = $documento->getSheet(0);
    $numFilas = $hojaActual->getHighestDataRow();
    $letra = $hojaActual->getHighestColumn();

    $numLetra = Coordinate::columnIndexFromString( $letra );

    for( $iFila = 2; $iFila <= $numFilas; $iFila++ ){
        $valorA = $hojaActual->getCellByColumnAndRow( 1, $iFila );
        $valorB = $hojaActual->getCellByColumnAndRow( 2, $iFila );
        $valorC = $hojaActual->getCellByColumnAndRow( 3, $iFila );
        $valorD = $hojaActual->getCellByColumnAndRow( 4, $iFila );
        
        $values = array(
            'id' => '',
            'apellidoNombre' => $valorA->getValue(),
            'legajo' => $valorB->getValue(),
            'materia' => $valorC->getValue(),
            'nota' => $valorD->getValue()
        );
        $rta = $controlNotas->insertar( $values );
    }
    //$arrayTotal = [];

    $contadorColumna = 0;
    $contadorFila = 0;
    try {
        $hojaActual = $documento->getSheet(0);
    } catch( \Throwable $th ){
        echo "No funco\n";
        var_dump($th);
    }

    // pa insertar en la db
    /* $apellidoNombres = $controlNotas->buscarKey( 'apellidoNombre' );
    $legajos = $controlNotas->buscarKey( 'legajo' );
    $materias = $controlNotas->buscarKey( 'materia' );
    $notas = $controlNotas->buscarKey( 'nota' ); */

?>

<?php // Reutilizar codigo del accionVer y accionCargar ?>
<div class="container">
    <div class="d-flex flex-row align-items-center mb-4">
        <div class="form-outline flex-fill mb-0">
            <table class="display table tablita" id="tablita">
                <h4 class="text-center m-2">Se han insertado los datos del archivo <?php echo $fileName ?></h4>
                <?php
                $contador = 1;
                foreach( $hojaActual->getRowIterator() as $fila ){
                    if( $contador == 1 ){
                        echo "<thead>";
                        $tipoCelda = "<th>";
                        $finCelda = "</th>";
                    } elseif( $contador == 2 ){
                        echo "<tbody>";
                        $tipoCelda = "<td>";
                        $finCelda = "</td>";
                    }
                    echo "<tr>";
                    foreach( $fila->getCellIterator() as $key => $celda ){
                        echo "$tipoCelda{$celda->getValue()}$finCelda";
                    }
                    echo "</tr>";
                    if( $contador == 1 ){
                        echo "</thead>";
                    }
                    $contador++;
                } 
                echo "</tbody>";
                ?>
            </table>
        </div>
    </div>
</div>

<link rel="stylesheet" href="../../Vendor/Datatables/datatables.min.css">
<script src="../../Vendor/Datatables/datatables.min.js"></script>
<script src="../../Public/jsPuro/data.js"></script>

<?php
    require_once('../templates/footer.php');
?>