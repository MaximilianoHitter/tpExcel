<?php
    require_once('../../config.php');
    require_once('../../Models/conector/db.php');
    require('../../Vendor/autoload.php');

    session_start();
    $conn = new db();
    
    if( !isset($_SESSION) ){
        session_start();
        if( isset($_SESSION['user_id']) ){
            var_dump($_SESSION['user_id']);
            $records = $conn->prepare( 'SELECT usuario, contraseña, mailInstitucional, materias FROM Profesor WHERE usuario = :usuario' );
            $records->bindParam( ':usuario', $_SESSION['user_id'] );
            $records->execute();
            $results = $records->fetch( PDO::FETCH_ASSOC );
            $mat = $conn->prepare( 'SELECT :materias FROM Profesor WHERE usuario = :usuario' );
            $mat->bindParam( ':materias', $_SESSION['user_materias'] );
            $mat->execute();
            //var_dump($results);
            $user = null;
            if( count($results) > 0 ){
                $user = $results;
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoMax - Excel</title>
    <link rel="icon" type="image/x-icon" href="../../Public/img/chip.png">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../Public/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS Puro -->
    <link rel="stylesheet" href="../../Public/cssPuro/style.css">
    <!--Datatables-->
    <link rel="stylesheet" href="../../Vendor/datatables/datatables.min.css">
    <script src="../../Vendor/datatables/datatables.min.js"></script>
    
</head>

<body>
    <header class="header start-0 top-0 end-0">

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                
                <a class="navbar-brand" href="../home/index.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Implementación</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../pages/ver.php">Ver</a></li>
                                <?php if( isset($_SESSION['user_id']) ): ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../pages/cargar.php">Cargar</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://github.com/MaximilianoHitter/tpExcel" target="_blank">GitHub</a>
                        </li>
                    </ul>
                </div>

                
                <!-- <form class="container-fluid d-flex justify-content-end">
                    <a href="../logs/login.php"><button class="btn btn-outline-success me-2" type="button">Login</button></a>
                    <a href="../logs/signup.php"><button class="btn btn-outline-info me-2" type="button">Registro</button></a>
                </form> -->

                <!-- Usuario (Cuando la persona ya está logueada) -->
                <?php if( isset($_SESSION['user_id']) ): ?>
                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                        <li class="nav-item dropdown user">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <button class="btn btn-outline-danger me-2" type="button"><?php echo $_SESSION['user_id']?></button>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../logs/logout.php">Salir</a></li>
                            </ul>
                        </li>
                    </div>
                <?php else: ?>
                    <!-- Login y Registro (Se muestra si la persona no está logueada) -->
                    <form class="container-fluid d-flex justify-content-end">
                        <a href="../logs/login.php"><button class="btn btn-outline-success me-2" type="button">Login</button></a>
                        <a href="../logs/signup.php"><button class="btn btn-outline-info me-2" type="button">Registro</button></a>
                    </form>
                <?php endif; ?>

            </div>
        </nav>
        
    </header>
    <h2 class="d-flex justify-content-center m-2">Clases útiles</h2>
