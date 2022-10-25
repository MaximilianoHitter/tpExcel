<?php 
    //pa leer excel
    require_once('../templates/header.php');
    
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Shared\File;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $controlExcel = new ControlExcel();
    $data = $controlExcel->getDatos();

    $dir = "../../Public/documents/userUpload/";
    $fileName = $_FILES['archivo']['name'];
    $fileTmp = $_FILES['archivo']['tmp_name'];
    $dirSubida = $dir . $fileName;

    move_uploaded_file( $fileTmp, $dirSubida );

    /* $basename = pathinfo( $data, PATHINFO_FILENAME );
    $archivo = $dir . $basename;
    move_uploaded_file( $basename, $archivo ); */

    $documento = IOFactory::load( $dirSubida );
    $arrayTotal = [];
    
    $contadorColumna = 0;
    $contadorFila = 0;
    try {
        $hojaActual = $documento->getSheet(0);
    } catch (\Throwable $th) {
        echo "No funco\n";
        var_dump($th);
    }
    
    // Cargar archivo subido por el usuario

    /* $pathFile = $_FILES['sel_file']['name'];
    $inputFileName = "$name";
    // Identificar el tipo de $inputFileName
    $inputFileType = IOFactory::identify( $inputFileName );
    // Crear un Reader para el tipo que se identificó
    $reader = IOFactory::createReader( $inputFileType );
    // Cargar $inputFileName a un objeto Spreadsheet
    $spreadsheet = $reader->load( $inputFileName ); */
    
    //$hojaActual = $documento->getSheet(0);
    ?>

<div class="d-flex flex-row align-items-center mb-4">
    <div class="form-outline flex-fill mb-0">
        <table class="display table tablita" id="tablita">
            <h4 class="text-center m-2">Archivo: <?php echo $fileName ?></h4>
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
                foreach( $fila->getCellIterator() as $celda ){
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

    <link rel="stylesheet" href="../../Vendor/Datatables/datatables.min.css">
    <script src="../../Vendor/Datatables/datatables.min.js"></script>
    <script src="../../Public/jsPuro/data.js"></script>

<?php
    require_once('../templates/footer.php');
?>