<?php
    require_once('../templates/header.php');
    require_once('../../Models/conector/db.php');
?>

<?php if( isset($_SESSION['user_id']) ): ?>
    <div class="d-flex justify-content-center position-absolute m-2">
        <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Bienvenido/a <b><?php echo $_SESSION['user_id'] ?></b>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = (e) => {
            let myAlert = document.querySelector( '.toast' );
            let bsAlert = new bootstrap.Toast( myAlert );
            bsAlert.show();
        }
    </script>
<?php endif; ?>

<div class="container position-relative">
    
    <h3 class="text-center mt-4">Excel</h3>
    <p class="ms-4 me-4 mt-5">
        Esta implementación de la librería <b><a href="https://github.com/PHPOffice/PhpSpreadsheet" target="_blank">"PHP Spreadsheet"</a></b> permite realizar las funciones CRUD (Create, Read, Update, Delete) de hojas de cálculo Excel. Cada una de estas funciones mencionadas tienen sus propias restricciones de uso dependiendo del usuario que vaya a utilizarlas. Un profesor solo podrá realizar un CRUD de las materias en las que se encuentre asignado en la base de datos, como también, un usuario sin registro (refiérase a un alumno) únicamente podrá leer las notas de las materias.
    </p>

    <p class="ms-4 mt-3">
        <b>Leanguajes utilizados:</b>
        <ul class="ms-4">
            <li>PHP</li>
            <li>JavaScript</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>MySQL</li>
        </ul>
    </p>

    <p class="ms-4">
        <b>Framework utilizado:</b>
        <ul class="ms-4">
            <li>Bootstrap</li>
        </ul>
    </p>

    <p class="ms-4">
        <b>Herramientas utilizadas:</b>
        <ul class="ms-4">
            <li>WAMP Server</li>
            <li>MySQL</li>
        </ul>
    </p>

    <p class="ms-4">
        <b>Editor de código utilizado:</b>
        <ul class="ms-4">
            <li>Visual Studio Code</li>
        </ul>
    </p>

</div>

<section class="p-5">
    <div class="container py-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-md">
                <a href="../pages/cargar.php"><img src="../../Public/img/learn-basics.png" class="img-fluid"></a>
            </div>
            <div class="col-md p-5">
                <h3>Aprendé lo básico</h3>
                <p>Para comenzar a trabajar con la web, el profesor deberá registrarse y posteriormente realizar un logueo para acceder a las funcionalidades implementadas. De esta forma, podrá comenzar a cargar un excel con las notas de los alumnos, para que luego ellos mismos puedan accederlos.</p>
                <p>Las demás funcionalidades, como las de modificar y borrar, solo podrán realizarse una vez que se haya realizado la carga de un archivo excel.</p>
                <a href="../pages/cargar.php" class="btn btn-primary mt-3">Empezar ya!</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark text-light p-5">
    <div class="container py-5">
        <div class="row align-items-center justify-content-between">
            <div class="col-md p-5">
                <h3>Instalación</h3>
                <p>Debe tener en cuenta que para realizar la instalación de las librerías primero debe cumplir ciertos requisitos, como por ejemplo, poseer una versión de PHP mayor a la 7.3, tener un servidor local para poder ejecutar los scripts como WAMP o XAMPP, y por último, poseer Composer.</p>

                <p>Las instalaciones mediante Composer son opcionales, ya que ambas librerías pueden ser instaladas de forma manual descargando un archivo comprimido, el cual incluye la librería.</p>
                <a href="https://docs.google.com/document/d/1rcKLyzDvkGfA7sbx-9CDE6Ak9hxqHJ7GBvuDWftzWio/edit?usp=sharing" target="_blank" class="btn btn-primary mt-3"><i class="bi bi-chevron-right"></i>Leer más</a>
            </div>
            <div class="col-md">
                <a href="#" class="btn mt-3">
                    <img src="../../Public/img/installation-png.png" alt="instalacao" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="p-5" id="questions">
    <div class="container py-5">
        <h3 class="text-center mb-4">Preguntas frecuentes</h3>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        ¿Quién puede ver los archivos subidos por los profesores?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Cualquiera puede ver los archivos que sean subidos por los profesores, no es necesario estar logueado y/o registrado en la plataforma para poder realizar esta tarea.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        ¿Quién puede cargar, borrar y eliminar excels?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Sólo los profesores <code>registrados</code> y <code>logueados</code> en la plataforma tendrán acceso a estas funcionalidades. Cualquier persona que no cumpla con estas condiciones no podrá realizarlas, sólo tendrá permisos de lectura.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        ¿Por qué son tan genios?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Nacimos así papá, aguante <big><b>BOCA</b></big>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
    require_once('../templates/footer.php');
?>