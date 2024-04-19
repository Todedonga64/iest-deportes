<?php
session_start();
$db=mysqli_connect("localhost","root","","iest_deportes");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link href="admin_css.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Patua+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Secular+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="admin.js"></script>
</head>

<body>

<header class="header">
    <h1>IEST DEPORTES</h1>
    <div class="bienvenido">
        <h2>Bienvenid@ <?php echo $_SESSION['usuario']?></h2>
    </div>
</header>

    <div class="sidebar">
        <ul>
            <li class="cerrarsesion" onclick="location.href='logout.php'"> Cerrar sesión</li>
        </ul>
    </div>

<div class="row mis-clases-cards">

    <div class="col-md-3 cursor-pointer academico">
        <a class="a-no-format cursor-pointer" id="23395"><div class="card subjects-home">
            <div class="card-body hvr-shutter-out-vertical ">
                <label class="card-title cursor-pointer">Deportes</label>
            </div>
            <div class="card-footer subjects-footer cursor-pointer"></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 cursor-pointer academico">
        <a class="a-no-format cursor-pointer" id="23395"><div class="card subjects-home">
            <div class="card-body hvr-shutter-out-vertical ">
                <label  onclick="location.href='solicitudes.php'" class="card-title cursor-pointer">Solicitudes</label>
            </div>
            <div class="card-footer subjects-footer cursor-pointer"></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 cursor-pointer academico">
        <a class="a-no-format cursor-pointer" id="23395"><div class="card subjects-home">
            <div class="card-body hvr-shutter-out-vertical ">
                <label class="card-title cursor-pointer">Historial Deportivo</label>
            </div>
            <div class="card-footer subjects-footer cursor-pointer"></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 cursor-pointer academico">
        <a class="a-no-format cursor-pointer" id="23395"><div class="card subjects-home">
            <div class="card-body hvr-shutter-out-vertical ">
                <label class="card-title cursor-pointer">Coaches</label>
            </div>
            <div class="card-footer subjects-footer cursor-pointer"></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 cursor-pointer academico">
        <a class="a-no-format cursor-pointer" id="23395"><div class="card subjects-home">
            <div class="card-body hvr-shutter-out-vertical ">
                <label class="card-title cursor-pointer">Horarios</label>
            </div>
            <div class="card-footer subjects-footer cursor-pointer"></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 cursor-pointer academico">
        <a class="a-no-format cursor-pointer" id="23395"><div class="card subjects-home">
            <div class="card-body hvr-shutter-out-vertical ">
                <label class="card-title cursor-pointer">Eventos</label>
            </div>
            <div class="card-footer subjects-footer cursor-pointer"></div>
            </div>
        </a>
    </div>

</div>

<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>

    <script src="admin\admin.js" charset="UTF-8"> </script>
</body>
</html>