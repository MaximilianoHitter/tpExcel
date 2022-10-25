<?php
trait Condicion{
    
    public function setearBusqueda($arrayBusqueda){
        $stringBusqueda = '';
        if(array_key_exists('id', $arrayBusqueda) && $arrayBusqueda['id'] != null){
            //hay que buscar con el dni
            $id = $arrayBusqueda['id'];
            $stringId = " id = $id ";
            $stringBusqueda.=$stringId;
        }
        if(array_key_exists('dni', $arrayBusqueda) && $arrayBusqueda['dni'] != null){
            //hay que buscar con el dni
            $dni = $arrayBusqueda['dni'];
            $stringDni = " dni = $dni ";
            if($stringBusqueda == ''){
                $stringBusqueda.=$stringDni;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringDni;
            }
           
        }
        if(array_key_exists('legajo', $arrayBusqueda) && $arrayBusqueda['legajo'] != null){
            //hay que buscar con legajo
            $legajo = $arrayBusqueda['legajo'];
            $stringLegajo = " legajo = '$legajo' ";
            if($stringBusqueda == ''){
                //no dni
                $stringBusqueda.=$stringLegajo;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringLegajo;
            }
        }
        if(array_key_exists('materia', $arrayBusqueda) && $arrayBusqueda['materia'] != null){
            //hay que buscar por materia
            $materia = $arrayBusqueda['materia'];
            $stringMateria = " materia = '$materia' ";
            if($stringBusqueda == ''){
                //no dni ni legajo
                $stringBusqueda.=$stringMateria;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringMateria;
            }
        }
        if(array_key_exists('carrera', $arrayBusqueda) && $arrayBusqueda['carrera'] != null){
            //hay que buscar por carrera
            $carrera = $arrayBusqueda['carrera'];
            $stringCarrera = " carrera = '$carrera' ";
            if($stringBusqueda == ''){
                //no dni ni legajo
                $stringBusqueda.=$stringCarrera;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringCarrera;
            }
        }
        return $stringBusqueda;
    }

    public static function setearBusquedaStatic($arrayBusqueda){
        $stringBusqueda = '';
        if(array_key_exists('id', $arrayBusqueda) && $arrayBusqueda['id'] != null){
            //hay que buscar con el dni
            $id = $arrayBusqueda['id'];
            $stringId = " id = $id ";
            $stringBusqueda.=$stringId;
        }
        if(array_key_exists('dni', $arrayBusqueda) && $arrayBusqueda['dni'] != null){
            //hay que buscar con el dni
            $dni = $arrayBusqueda['dni'];
            $stringDni = " dni = $dni ";
            if($stringBusqueda == ''){
                $stringBusqueda.=$stringDni;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringDni;
            }
           
        }
        if(array_key_exists('legajo', $arrayBusqueda) && $arrayBusqueda['legajo'] != null){
            //hay que buscar con legajo
            $legajo = $arrayBusqueda['legajo'];
            $stringLegajo = " legajo = '$legajo' ";
            if($stringBusqueda == ''){
                //no dni
                $stringBusqueda.=$stringLegajo;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringLegajo;
            }
        }
        if(array_key_exists('materia', $arrayBusqueda) && $arrayBusqueda['materia'] != null){
            //hay que buscar por materia
            $materia = $arrayBusqueda['materia'];
            $stringMateria = " materia = '$materia' ";
            if($stringBusqueda == ''){
                //no dni ni legajo
                $stringBusqueda.=$stringMateria;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringMateria;
            }
        }
        if(array_key_exists('carrera', $arrayBusqueda) && $arrayBusqueda['carrera'] != null){
            //hay que buscar por carrera
            $carrera = $arrayBusqueda['carrera'];
            $stringCarrera = " carrera = '$carrera' ";
            if($stringBusqueda == ''){
                //no dni ni legajo
                $stringBusqueda.=$stringCarrera;
            }else{
                $stringBusqueda.= ' and ';
                $stringBusqueda.= $stringCarrera;
            }
        }
        return $stringBusqueda;
    }

}