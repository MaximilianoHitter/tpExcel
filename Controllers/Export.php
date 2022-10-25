<?php
/* require_once('../config.php'); */
/* require_once('../Vendor/autoload.php'); */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

trait Export {
    
    public function genera($array) {
        /* var_dump($array); */
        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $contador = 1;
            $arrayLetras = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I' );
            foreach( $array as $key => $value ){
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
        }
    }

}