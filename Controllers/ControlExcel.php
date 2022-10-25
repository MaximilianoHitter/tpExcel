<?php
/* require_once('../config.php'); */

class ControlExcel extends MasterController {
    // Usamos Export y Errores
    use Errores, Export;
    // Vamos a hacer un form que venga con los datos del Condicion.php y generar solo con esos el excel
    public function export( $arrayBusqueda ){
        $rta = Notas::listar( $arrayBusqueda );
        $bandera = true;
        // Comprobar error
        if( $rta['respuesta'] == true ){
            $datos['array'] = $rta['array'];
            $respuestaExport = $this->genera( $datos['array'] );
        } else {
            $datos['error'] = $this->manejarError( $rta );
            echo $datos['error'];
        }
        // Generar excel papu
    }
}