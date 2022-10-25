<?php
// Es el archivo 'prueba2.php' del repo del weon del maxi
//Funco bien, vamos carajo
require('../Vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$arrayTH = array('DNI', 'Nota', 'Materia');
$arrayMaxi = array('38258043', '10', 'AySC');
$arrayGonza = array('43152132', '4', 'AySC');
$arrayTotal = array($arrayTH, $arrayMaxi, $arrayGonza);
try {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $contador = 1;
    $arrayLetras = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I');
    foreach ($arrayTotal as $key => $value) {
        $contadorColumnas = 0;
        foreach ($value as $llave => $valor) {
            $letra = $arrayLetras[$contadorColumnas];
            $sheet->setCellValue("$letra$contador", "$valor");
            $contadorColumnas++;
        }
        $contador++;
    }
    echo "Se pudo crear la hoja de calculo!\n";
} catch (\Throwable $th) {
    echo "Algo faio :c\n";
    var_dump($th);
}

try {
    $writer = new Xlsx($spreadsheet);
    $writer->save('notas.xlsx');
    echo "Se pudo guardar la hoja!\n";
} catch (\Throwable $th) {
    echo "No se pudo guardar :c \n";
    var_dump($th);
}