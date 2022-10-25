<?php

class ProfesorController extends MasterController {

    public function buscar() {
        $data = $this->buscarKey( 'buscarProfesor' );
        if( $data != false ){
            // Se encontró
            $profesor = new Profesor();
            $rta = $profesor->buscar( $data );
            if( $rta['respuesta'] ){
                return $profesor;
            } else {
                if( $rta['codigoError'] == 3 ){
                    return null;
                } else {
                    return null;
                }
            }
            $profesor = null;
        } else {
            $respuesta = 'No se encontró';
        }
        return $respuesta;
    }

    // Metodo para insertar
    public function insertar() {
        $usuario = $this->buscarKey( 'usuario' );
        $contraseña = $this->buscarKey( 'contraseña' );
        $mailInstitucional = $this->buscarKey( 'mailInstitucional' );
        $materias = $this->buscarKey( 'materias' );
        if( $usuario != false && $contraseña != false && $mailInstitucional != false && $materias != false ){
            //creo el objeto y lo inserto
            $profesor = new Profesor();
            $profesor->cargar( $usuario, $contraseña, $mailInstitucional, $materias );
            if( $profesor->insertar() ){
                //se pudo insertar
                //ver que mensaje mandar a vista
                $rta = true;
            } else {
                //no se pudo insertar
                $rta = $profesor->getMensajeOp();
            }
            $profesor = null;
        } else {
            //si alguno de los datos no fue cargado se da error
            $rta = false;
        }
        return $rta;
    }

    //Metodo para listar personas
    public function listar() {
        $arregloProfesor = Profesor::listar();
        return $arregloProfesor;
    }

}