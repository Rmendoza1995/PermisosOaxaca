<?php
	session_start();
    if(!isset($_SESSION['usuario'])) {
        echo '<script type="text/javascript">
                alert("Usted No tiene Permitido el Acceso a esta parte.");
                window.location.href="registrousfolio/IniciarSesion.php";
              </script>';
    }
include("configuracion.php");
$sqlfolio = "SELECT * FROM useros where usuario='" . $_SESSION['usuario'] . "' limit 1";
$resultredirec = $link->query($sqlfolio);
$levely='';
while ($row = $resultredirec->fetch_assoc()) {
    $levely = $row['levely'];
    if ($levely == 3) {
        $sql = "SELECT * FROM creapermiso where usuario='" . $_SESSION['usuario'] . "' limit 200";
    } else {
        $sql = "SELECT * FROM creapermiso limit 200";
    }
}
$resultado = $link->query($sql);
echo '';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Formulario</title>
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
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
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
  <a href="index.php"><i class="fas fa-home"></i> Iniciar</a>
 <?php if($levely==3){echo '<a href="creapermiso.php"><i class="fas fa-file-alt"></i> Registrar Permiso</a>';
  echo '<a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>';
}
 else{
 echo '<a href="creapermiso.php"><i class="fas fa-file-alt"></i> Registrar Permiso</a>'; 
 echo '<a href="registrousfolio/index.php"><i class="fas fa-user-plus"></i> Registrar usuario</a> ';
 echo '<a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>';
 }
 ?>


  </div>
</div>


    <form method="POST" action="updpermiso.php">
        <input type="text" name="Foliopermi" placeholder="Escribe Folio del permiso" required />
        <input type="hidden" name="validar" value="true" />
        <button class="btn btn-info">Editar/Eliminar</button>
    </form><br>


    <form method="POST" action="formatopago.php">
        <input type="text" name="Foliopermi" placeholder="Escribe Folio del permiso" required>
        <button class="btn btn-primary">Crear Formato de pago</button>
    </form>
    <br>
  

    <br>
    <center>
        <h1 style="color:white;">Lista de Permisos</h1>
        <table style="color:white; overflow-x: scroll;" border="2px">
            <thead>
                <tr>
                    <th>Propietario</th>
                    <th>Ciudad</th>
                    <th>Folio</th>
                    <th>Vigencia</th>
                    <th>Fecha expedicion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Iterar sobre los resultados y mostrar cada fila en la tabla
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['propietario'] . "</td>";
                    echo "<td>" . $fila['ciudad'] . "</td>";
                    echo "<td>" . $fila['Foliopermi'] . "</td>";
                    echo "<td>" . $fila['vigencia'] . "</td>";
                    echo "<td>" . $fila['fecha_expedicion'] . "</td>";
                    echo "<td><a style='color:white;' href='updpermiso.php?id=" . $fila['id'] . "'>Modificar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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
        $link->close();
        ?>


</body>

</html>