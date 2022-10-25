<?php

class ControlNotas extends MasterController {
    //uso el trait de errores
    use Errores;

    //metodo para listar todo
    public function listarTodo($arrayBusqueda) {
        $rta = Notas::listar($arrayBusqueda);
        if ($rta['respuesta'] == true) {
            $datos['array'] = $rta['array'];
        } else {
            $datos['error'] = $this->manejarError($rta);
        }
        return $datos;
    }

    //metodo para buscar por el id de la tabla
    public function buscarId() {
        $idBusqueda = $this->buscarKey('id');
        if($idBusqueda == false){
            //hubo un error
            $datos['error'] = $this->warning('No se ha encontrado dicho registro.');
        }else{
            //se encontro
            $array['id'] = $idBusqueda;
            $nota = new Notas();
            $rta = $nota->buscar($array);
            if($rta['respuesta'] == false){
                $datos['error'] = $this->manejarError($rta);
            }else{
                $datos['array'] = $nota;
            }
            return $datos;
        }
    }

    //metodo para generar el html de una nota 
    public function notaHTML($objNota) {
        $datos = $objNota->dameDatos();
        //[$id, $legajo, $dni, $nombre, $apellido, $mail, $carrera, $materia, $nota] = $datos;
        extract($datos, EXTR_PREFIX_SAME, '');
        $variableHTML = "<div class=\"card text-bg-secondary mb-3\" style=\"max-width: 30rem;\">
        <div class=\"card-header\">Nota id = $id</div>
        <div class=\"card-body\">
          <h5 class=\"card-title\">Materia: $materia</h5>
          <h5 class=\"card-title\">Nota: $nota</h5>
          <p class=\"card-text\">
          Legajo: $legajo<br>
          Nombre: $nombreApellido<br>
          </p>
          <br>
          <a href=\"listarTodo.php\" class=\"btn btn-primary\">Volver a lista</a>
        </div>";
        return $variableHTML;
    }

    public function insertar( $data ){
        $notaNueva = new Notas();
        $notaNueva->setId($data['id']);
        $notaNueva->setApellidoNombre($data['apellidoNombre']);
        $notaNueva->setLegajo($data['legajo']);
        $notaNueva->setMateria($data['materia']);
        $notaNueva->setNota($data['nota']);
        $bandera = null;
        //$notaNueva->cargar($data['id'], $data['apellidoNombre'], $data['legajo'],  $data['materia'], $data['nota'] );
        //var_dump($notaNueva);
        $algo = $notaNueva->insertar();
        return $algo;
    }

    public function cargarObjeto( $param ){
        $obj = null;
        if( array_key_exists('legajo', $param) ){
            $obj = new Notas();
            $obj->cargar( '', $param['legajo'], $param['apellidoNombre'], $param['materia'], $param['nota']);
            $obj->insertar();
        }
        return $obj;
    }

    public function seteadosCamposClaves( $param ){
        $bandera = false;
        if( isset($param['legajo']) ){
            $bandera = true;
        }
        return $bandera;
    }

    public function modificacion( $data ){
        $bandera = false;
        if( $this->seteadosCamposClaves($data) ){
            $objNota = $this->cargarObjeto( $data );
            if( $objNota != null && $objNota->modificar() ){
                $bandera = true;
            }
        }
        return $bandera;
    }

}