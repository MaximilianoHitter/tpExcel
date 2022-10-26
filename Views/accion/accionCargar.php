<?php
    require_once('../templates/header.php');
    require('../../Vendor/autoload.php');
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    /* use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Cell\Coordinate; */

    $controlExcel = new ControlExcel();
    $controlNotas = new ControlNotas();

    $apellidoNombres = $controlNotas->buscarKey( 'apellidoNombre' );
    $legajos = $controlNotas->buscarKey( 'legajo' );
    $materias = $controlNotas->buscarKey( 'materia' );
    $notas = $controlNotas->buscarKey( 'nota' );
    //var_dump( $apellidoNombres, $legajos, $materias, $notas );
    $arrayTH = array( 'Apellido y Nombre', 'Legajo', 'Materia', 'Nota' );
    $arrayTotal = array();
    array_push($arrayTotal, $arrayTH);
    foreach ($apellidoNombres as $key => $value) {
        $arrayTupla[0] = $value;
        $arrayTupla[1] = $legajos[$key];
        $arrayTupla[2] = $materias[$key];
        $arrayTupla[3] = $notas[$key];
        //intento de carga en db
        $arrayNuevo['id'] = '';
        $arrayNuevo['apellidoNombre'] = $arrayTupla[0];
        $arrayNuevo['legajo'] = $arrayTupla[1];
        $arrayNuevo['materia'] = $arrayTupla[2];
        $arrayNuevo['nota'] = $arrayTupla[3];
        //var_dump($arrayNuevo);
        $rta = $controlNotas->insertar($arrayNuevo);
        if($rta['respuesta']){
            //echo "gut";
            echo "<div class=\"container\"><div class=\"alert alert-success text-center\" role=\"alert\">¡Se han cargado correctamente en la base de datos!</div></div>";
            array_push($arrayTotal, $arrayTupla);
        }else{
            //echo "faio";
            echo "<div class=\"container\"><div class=\"alert alert-warning text-center\" role=\"alert\">¡Ups, hubo algún problema :c!</div></div>";
            //var_dump($rta['errorInfo']);
        }
        
        
    };
    

    
    
    //hacer la inversa de la matriz y subir los datos a la db en la tabla notas(maxi)
    //var_dump($arrayTotal);
    //die();

    try {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $contador = 1;
        $arrayLetras = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I' );
        foreach( $arrayTotal as $key => $value ){
            $contadorColumnas = 0;
            //var_dump($value);
            foreach( $value as $llave => $valor ){
                //var_dump($valor);
                $letra = $arrayLetras[$contadorColumnas];
                $sheet->setCellValue( "$letra$contador", "$valor" );
                $sheet->getColumnDimension($letra)->setWidth(30);
                $contadorColumnas++;
            }
            $contador++;
        }
        $spreadsheet->getProperties()->setCreator('GoMax');
        $spreadsheet->getDefaultStyle()->getFont()->setName('Poppins');
        $spreadsheet->getDefaultStyle()->getFont()->setSize('20');
        echo "<div class=\"container\"><div class=\"alert alert-success text-center\" role=\"alert\">¡Se pudo crear la hoja de calculo!</div></div>";
    } catch( \Throwable $th ){
        echo "<div class=\"container\"><div class=\"alert alert-warning text-center\" role=\"alert\">¡No se ha podido crear la hoja de calculo!</div></div>";
        //var_dump($th);
    }
        
    $name = rand( 0, 1000 );
    try {
        $writer = new Xlsx( $spreadsheet );
        $writer->save("../../Public/documents/profesorUpload/$name.xlsx");
        /* $documento = IOFactory::load( "../../Public/documents/profesorUpload/$name.xlsx" );

        $totalHojas = $documento->getSheetCount();
        $hojaActual = $documento->getSheet(0);
        $numFilas = $hojaActual->getHighestDataRow();
        $letra = $hojaActual->getHighestColumn();
        $numLetra = Coordinate::columnIndexFromString($letra);
        for ($iFila = 1; $iFila <= $numFilas; $iFila++ ){
            $valueA = $hojaActual->getCellByColumnAndRow( 1, $iFila );
            $valueB = $hojaActual->getCellByColumnAndRow( 2, $iFila );
            $valueC = $hojaActual->getCellByColumnAndRow( 3, $iFila );
            $valueD = $hojaActual->getCellByColumnAndRow( 4, $iFila );
        }
        $arrayValores = array(
            'id' => '',
            'apellidoNombre' => $valueA,
            'legajo' => $valueB,
            'materia' => $valueC,
            'nota' => $valueD
        );
        $controlNotas->insertar( $arrayValores ); */
        echo "<div class=\"container\"><div class=\"alert alert-success text-center\" role=\"alert\"><a href=\"../../Public/documents/profesorUpload/$name.xlsx\" download=\"comprobante.xlsx\">Descargue su comprobante</a></div></div>";
    } catch( \Throwable $th ){
        echo "<div class=\"container\"><div class=\"alert alert-warning text-center\" role=\"alert\">¡No podrá descargar su comprobante!</div></div>";
        //var_dump($th);
    }

    /* $legajos = $data['POST']['legajo'];
    $apellidoNombres = $data['POST']['apellidoNombre'];
    $materias = $data['POST']['materia'];
    $notas = $data['POST']['nota']; */
    /* $arrayNotas = [$apellidoNombres, $legajos, $materias, $notas];
    for( $i = 0; $i < count($arrayNotas); $i++ ){
        $legajo = $legajos[$i];
        $apellidoNombre = $apellidoNombres[$i];
        $materia = $materias[$i];
        $nota = $notas[$i];
        $id = '';

        $arrayNota = array(
            'id' => $id, 
            'apellidoNombre' => $apellidoNombre,
            'legajo' => $legajo,
            'materia' => $materia,
            'nota' => $nota);
        $objNota = $controlNotas->cargarObjeto( $arrayNota );
        $controlNotas->insertar( $arrayNota );
        $arrayTotal = [$arrayTH, $arrayNotas];
        var_dump( $arrayTotal );
        $controlNotas->notaHTML( $arrayNota );
        $controlExcel->export( $arrayTotal );
        $i++;
    } */


    /* $arrayNota = array(
        'legajos' => $legajos,
        'apellidoNombres' => $apellidoNombres,
        'materias' => $materias,
        'notas' => $notas
    );
    $arrayTotal = array( $arrayTH, $arrayNota );
        
    var_dump( $arrayTotal );
    $controlNotas->notaHTML( $arrayNota );
    $controlExcel->export( $arrayTotal ); */

    /* try {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $contador = 1;
        $arrayLetras = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I' );
        foreach( $arrayTotal as $key => $value ){
            $contadorColumnas = 0;
            foreach( $value as $llave => $valor ){
                $letra = $arrayLetras[$contadorColumnas];
                $sheet->setCellValue( "$letra$contador", "$valor" );
                $contadorColumnas++;
            }
            $contador++;
        }
        echo '<p class="lead d-flex justify-content-center">Se pudo crear la hoja de calculo!</p>';
    } catch( \Throwable $th ){
        echo '<p class="lead d-flex justify-content-center">Algo faio :c</p>';
        var_dump($th);
    }
        
    $name = rand( 0, 1000 );
    try {
        $writer = new Xlsx( $spreadsheet );
        $writer->save("../../Public/documents/$name.xls");
        echo '<p class="lead d-flex justify-content-center">Se pudo guardar la hoja!</p>';
    } catch( \Throwable $th ){
        echo '<p class="lead d-flex justify-content-center">No se pudo guardar :c</p>';
        var_dump($th);
    } */
    
?>

<?php
    require_once('../templates/footer.php');
?>