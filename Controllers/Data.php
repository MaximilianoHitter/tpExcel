<?php

trait Data {

    public function data() {
        $datos = [];
        if( isset($_GET) && count($_GET) >= 0 ){
            $datosGet = [];
            foreach ($_GET as $key => $value) {
                if( $value != null || $value != '' ){
                    $datosGet["$key"] = $value;
                } else {
                    $datosGet["$key"] = 'void';
                }
            }
        }

        if( isset($_POST) && count($_POST) >= 0 ){
            $datosPost = [];
            foreach( $_POST as $key => $value ){
                if( $value != null || $value != '' ){
                    $datosPost["$key"] = $value;
                } else {
                    $datosPost["$key"] = 'void';
                }
            }
        }

        $datos['GET'] = $datosGet;
        $datos['POST'] = $datosPost;
        return( $datos );
    }

}