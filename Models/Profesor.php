<?php

class Profesor {
    // Atributos
    private $usuario;
    private $contrasenia;
    private $mailInstitucional;
    private $materia;
    private $mensajeOp;
    static $mensajeOperacion = '';
    
    public function __construct() {
        $this->usuario = '';
        $this->contrasenia = '';
        $this->mailInstitucional = '';
        $this->materia = '';
        $this->mensajeOp = '';
    }

    // Getters & Setters
    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario( $usuario ){
        $this->usuario = $usuario;
    }
    
    public function getContrasenia() {
        return $this->contrasenia;
    }
    public function setContrasenia( $contrasenia ){
        $this->contrasenia = $contrasenia;
    }
    
    public function getMailInstitucional() {
        return $this->mailInstitucional;
    }
    public function setMailInstitucional( $mailInstitucional ){
        $this->mailInstitucional = $mailInstitucional;
    }
    
    public function getMateria() {
        return $this->materia;
    }
    public function setMateria( $materia ){
        $this->materia = $materia;
    }
    
    public function getMensajeOp() {
        return $this->mensajeOp;
    }
    public function setMensajeOp( $mensajeOp ){
        $this->mensajeOp = $mensajeOp;
    }

    public static function getMensajeOperacion() {
        return Profesor::$mensajeOperacion;
    }
    public static function setMensajeOperacion( $mensajeOperacion ){
        Profesor::$mensajeOperacion = $mensajeOperacion;
    }
    
    public function cargar( $usuario, $contrasenia, $mailInstitucional, $materia ){
        $this->setUsuario( $usuario );
        $this->setContrasenia( $contrasenia );
        $this->setMailInstitucional( $mailInstitucional );
        $this->setMateria( $materia );
    }

    public function buscar( $usuario ){
        // Seteo de respuesta
        $respuesta['respuesta'] = false;
        $respuesta['errorInfo'] = '';
        $respuesta['codigoError'] = null;
        $base = new db();
        $sql = "SELECT * FROM profesor WHERE usuario = $usuario";
        try {
            if( $base->Iniciar() ){
                if( $base->Ejecutar($sql) ){
                    if( $row2 = $base->Registro() ){
                        $this->setUsuario( $row2['usuario'] );
                        $this->setContrasenia( $row2['contrasenia'] );
                        $this->setMailInstitucional( $row2['mailInstitucional'] );
                        $this->setMateria( $row2['materia'] );
                        $respuesta['respuesta'] = true;
                    }
                } else {
                    $this->setMensajeOp( $base->getError() );
                    $respuesta['respuesta'] = false;
                    $respuesta['errorInfo'] = 'Hubo un error con la consulta';
                    $respuesta['codigoError'] = 1;
                }
            } else {
                $this->setMensajeOp( $base->getError() );
                $respuesta['respuesta'] = false;
                $respuesta['errorInfo'] = 'Hubo un error con la conexión de la base de datos';
                $respuesta['codigoError'] = 0;
            }
        } catch( \Throwable $th ){
            $respuesta['respuesta'] = false;
            $respuesta['errorInfo'] = $th;
            $respuesta['codigoError'] = 3;
        }
        $base = null;
        return $respuesta;
    }

    public function insertar() {
        // Seteo de respuesta
        $respuesta['respuesta'] = false;
        $respuesta['errorInfo'] = '';
        $respuesta['codigoError'] = null;
        $base = new db();
        $consultaInsertar = "INSERT INTO profesor VALUES('{$this->getUsuario()}', '{$this->getContrasenia()}', '{$this->getMailInstitucional()}', '{$this->getMateria()}')";
        try {
            if( $base->Iniciar() ){
                if( $base->Ejecutar($consultaInsertar) ){
                    $respuesta['respuesta'] = true;
                } else {
                    $this->setMensajeOp( $base->getError() );
                    $respuesta['respuesta'] = false;
                    $respuesta['errorInfo'] = 'Hubo un error con la consulta';
                    $respuesta['codigoError'] = 1; 
                }
            } else {
                $this->setMensajeOp( $base->getError() );
                $respuesta['respuesta'] = false;
                $respuesta['errorInfo'] = 'Hubo un error con la conexión de la base de datos';
                $respuesta['codigoError'] = 0; 
            }
        } catch( \Throwable $th ){
            $respuesta['respuesta'] = false;
            $respuesta['errorInfo'] = $th;
            $respuesta['codigoError'] = 3;
        }
        
        $base = null;
        return $respuesta;
    }

    public function modificar(){
        // Seteo de respuesta
        $respuesta['respuesta'] = false;
        $respuesta['errorInfo'] = '';
        $respuesta['codigoError'] = null;
        $base = new db();
        $consultaModifica = "UPDATE profesor SET usuario = '{$this->getUsuario()}', contrasenia = '{$this->getContrasenia()}', mailInstitucional = '{$this->getMailInstitucional()}', materia = '{$this->getMateria()}' WHERE usuario = '{$this->getUsuario()}'";
        try {
            if( $base->Iniciar() ){
                if( $base->Ejecutar($consultaModifica) ){
                    $respuesta['respuesta'] = true;
                } else {
                    $this->setMensajeOp($base->getError());
                    $respuesta['respuesta'] = false;
                    $respuesta['errorInfo'] = 'Hubo un error con la consulta';
                    $respuesta['codigoError'] = 1;
                }
            } else {
                $this->setMensajeOp( $base->getError() );
                $respuesta['respuesta'] = false;
                $respuesta['errorInfo'] = 'Hubo un error con la conexión de la base de datos';
                $respuesta['codigoError'] = 0;
            }
        } catch( \Throwable $th ){
            $respuesta['respuesta'] = false;
            $respuesta['errorInfo'] = $th;
            $respuesta['codigoError'] = 3;
        }
        return $respuesta;
    }

    // Buscar en el controlador si no hay autos cargados con el dni
    public function eliminar(){
        //seteo de respuesta
        $respuesta['respuesta'] = false;
        $respuesta['errorInfo'] = '';
        $respuesta['codigoError'] = null;
        $base = new db();
        $consultaElimina = "DELETE FROM profesor WHERE usuario = '{$this->getUsuario()}'";
        try {
            if( $base->Iniciar() ){
                if( $base->Ejecutar($consultaElimina) ){
                    $respuesta['respuesta'] = true;
                } else {
                    $this->setMensajeOp( $base->getError() );
                    $respuesta['respuesta'] = false;
                    $respuesta['errorInfo'] = 'Hubo un error con la consulta';
                    $respuesta['codigoError'] = 1;
                }
            } else {
                $this->setMensajeOp( $base->getError() );
                $respuesta['respuesta'] = false;
                $respuesta['errorInfo'] = 'Hubo un error con la conexión de la base de datos';
                $respuesta['codigoError'] = 0;
            }
        } catch( \Throwable $th ){
            $respuesta['respuesta'] = false;
            $respuesta['errorInfo'] = $th;
            $respuesta['codigoError'] = 3;
        }
        return $respuesta;
    }

    public static function listar( $condicion = '' ){
        // Seteo de respuesta
        $respuesta['respuesta'] = false;
        $respuesta['errorInfo'] = '';
        $respuesta['codigoError'] = null;
        $arregloProfesor = null;
        $base = new db();
        $consultaProfesor = "SELECT * FROM profesor";

        if( $condicion != '' ){
            $consultaProfesor = $consultaProfesor . ' WHERE ' . $condicion;
        }
        try {
            if( $base->Iniciar() ){
                if( $base->Ejecutar($consultaProfesor) ){
                    $arregloProfesor = array();
                    while($row2 = $base->Registro()){
                        $usuario = $row2['usuario'];
                        $contrasenia = $row2['contrasenia'];
                        $mailInstitucional = $row2['mailInstitucional'];
                        $materia = $row2['materia'];
    
                        $profesor = new Profesor();
                        $profesor->cargar( $usuario, $contrasenia, $mailInstitucional, $materia );
                        array_push( $arregloProfesor, $profesor );
                    }
                } else {
                    Profesor::setMensajeOperacion( $base->getError() );
                    $respuesta['respuesta'] = false;
                    $respuesta['errorInfo'] = 'Hubo un error con la consulta';
                    $respuesta['codigoError'] = 1;
                }
            } else {
                Profesor::setMensajeOperacion( $base->getError() );
                $respuesta['respuesta'] = false;
                $respuesta['errorInfo'] = 'Hubo un error con la conexión de la base de datos';
                $respuesta['codigoError'] = 0;
            }
        } catch( \Throwable $th ){
            $respuesta['respuesta'] = false;
            $respuesta['errorInfo'] = $th;
            $respuesta['codigoError'] = 3;
        }
        $base = null;
        if( $arregloProfesor == null ){
            return $respuesta;
        } else {
            return $arregloProfesor;
        }
    }

    public function dameDatos(){
        $data = [];
        $data['usuario'] = $this->getUsuario();
        $data['contrasenia'] = $this->getContrasenia();
        $data['mailInstitucional'] = $this->getMailInstitucional();
        $data['materia'] = $this->getMateria();
        return $data;
    }

}