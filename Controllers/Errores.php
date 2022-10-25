<?php
/* require_once('../config.php'); */
trait Errores {

  //funcion para manejar que error es y ver que se devuelve
  public function manejarError($errorArray)
  {
    $codigoError = $errorArray['codigoError'];
    switch ($codigoError) {
      case '0':
        $datos = $this->fatal('Error en la conexion con la db.');
        break;

      case '1':
        $datos = $this->warning('Algo falló en la consulta.');
        break;

      case '2':
        $datos = $this->warning('Algo falló en la delegación entre las tablas.');
        break;

      case '3':
        $error = $errorArray['errorInfo']->errorInfo;
        if ($error[1] == 1062) {
          $datos = $this->warning('El registro ya existe en la base de datos');
        } elseif ($error[1] == 1451) {
          $datos = $this->warning('Posee registros asociados en otra tabla.');
        } else {
          var_dump($error);
        }
        break;

      default:
        # code...
        break;
    }
    return $datos;
  }

  //Html para warning
  public function warning($error)
  {
    $errorWarning = "<div class=\"alert alert-warning\" role=\"alert\">
        $error
      </div>";
    return $errorWarning;
  }

  //Html para fatal error
  public function fatal($error)
  {
    $errorFatal = "<div class=\"alert alert-danger\"  role=\"alert\">
        $error
      </div>";
    return $errorFatal;
  }
}
