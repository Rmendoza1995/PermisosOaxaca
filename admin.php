<?php
// Conexión a la base de datos y consulta SQL
include("configuracion.php");
session_start(); 
if(!isset($_SESSION['usuario'])) {
	echo '<script type="text/javascript">
			alert("Usted No tiene Permitido el Acceso a esta parte.");
			window.location.href="registrousfolio/IniciarSesion.php";
		  </script>';
}
$sqlfolio = "SELECT * FROM useros where usuario='".$_SESSION['usuario']."' limit 1";
$resultfolio = $link->query($sqlfolio);

if ($resultfolio->num_rows > 0) {
    while ($row = $resultfolio->fetch_assoc()) {
        $levely = $row['levely'];



        if ($levely == 3) {
			echo '<script type="text/javascript">
			alert("Usted No tiene Permitido el Acceso a esta parte.");
			window.location.href="buscadorInterno.php";
		  </script>';
        } else {


        }

    }
}

$sql = "SELECT * FROM useros  limit 200";
$resultado = $link->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<title>Vista Administrador</title>
<style>
    body {
    background: rgb(2,0,36);
    background: -moz-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 36%, rgba(0,212,255,1) 96%);
    background: -webkit-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 36%, rgba(0,212,255,1) 96%);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 36%, rgba(0,212,255,1) 96%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#020024",endColorstr="#00d4ff",GradientType=1);
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: calc(100% - 12px);
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #ccc;
       
    }
    input[type="file"] {
        width: calc(100% - 12px);
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    select {
        width: 100%;
        padding: 6px;
        border-radius: 5px;
        border: 1px solid red;
    }
    button {
        padding: 10px 20px;
        background-color: red;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #45a049;
    }

    /*empieza menu*/
    .overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: goldenrod;
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 15%;
  width: 100%;
  text-align: center;
  margin-top: 10px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color:white;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>
</head>
<body>

<span style="font-size:30px;cursor:pointer; color:white;" onclick="openNav()">&#9776; Menu</span>
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <a href="index.php"><i class="fas fa-home"></i> Home</a>
    <a href="registrousfolio/index.php"><i class="fas fa-user-plus"></i> Registrar usuario</a>
    <a href="" ><i class="fas fa-search"></i>Usuario: Buscar/Asignar , Editar/Eliminar</a>
    <a href="buscadorInterno.php"><i class="fas fa-search"></i> Buscar Permiso</a>
    <a href="creapermiso.php"><i class="fas fa-file-alt"></i> Registrar Permiso</a>
    <a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>

  </div>
</div>

<div class="container">
    <form method="post" action="updusuario.php">        
        <input type="text" name="usuario" id="usuario" placeholder="usuario" required>
        <button class="btn btn-primary">Asignar Folios</button>
    </form>

    <center><h1 style="color:black;">Lista de Usuarios</h1></center>
    <table style="color:black; overflow-x: scroll;" border="2px">
        <thead>
            <tr >
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Fecha Registro</th>
                <th>No. Folios</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td >" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['usuario'] . "</td>";
                echo "<td>" . $fila['fecha_registro'] . "</td>";
                echo "<td>" . $fila['Num_folios'] . "</td>";
                // Continúa mostrando más columnas según tus necesidades
                echo "<td><a style='color:green;' href='updusuario.php?usuario=" . $fila['usuario'] . "'>Modificar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function openNav() {
  var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

  if (width <= 768) { // Suponiendo que 768 píxeles sea el ancho típico de un dispositivo en modo teléfono
    document.getElementById("myNav").style.width = "100%";
  } else {
    document.getElementById("myNav").style.width = "50%";
  }
}


function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>

<?php
// Cerrar la conexión a la base de datos
$link->close();
?>

</body>
</html>
