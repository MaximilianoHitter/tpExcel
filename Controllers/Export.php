<?php
/* require_once('../config.php'); */
/* require_once('../Vendor/autoload.php'); */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

trait Export {
    
    public function genera($array) {
        //var_dump($array);
        $arrayFinal = $array['array'];
        $arrayTH = array('ID', 'Nombre y Apellido', 'Legajo', 'Materia', 'Nota');
        array_unshift($arrayFinal, $arrayTH);
        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $contador = 1;
            $arrayLetras = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I' );
            foreach( $arrayFinal as $key => $value ){
                if($contador != 1){
                    $datos = $value->dameDatos();
                }else{
                    $datos = $value;
                }
                $contadorColumnas = 0;
                foreach( $datos as $llave => $valor ){
                    $letra = $arrayLetras[$contadorColumnas];
                    $sheet->setCellValue( "$letra$contador", "$valor" );
                    $contadorColumnas++;
                }
                $contador++;
            }
            //echo '<p class="lead d-flex justify-content-center">Se pudo crear la hoja de calculo!</p>';
        } catch( \Throwable $th ){
            //echo '<p class="lead d-flex justify-content-center">Algo faio :c</p>';
            var_dump($th);
        }
            
        $name = rand( 0, 1000 );
        try {
            $writer = new Xlsx( $spreadsheet );
            $writer->save("../../Public/documents/$name.xlsx");
            $ruta = "../../Public/documents/$name.xlsx";
            //echo '<p class="lead d-flex justify-content-center">Se pudo guardar la hoja!</p>';
        } catch( \Throwable $th ){
            //echo '<p class="lead d-flex justify-content-center">No se pudo guardar :c</p>';
            var_dump($th);
        }
        return $ruta;
    }

}