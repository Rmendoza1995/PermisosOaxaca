<?php
	session_start();

// Conexión a la base de datos y consulta SQL
include("configuracion.php");

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



$sql = "SELECT * FROM finanzasadeudo  limit 200";
$resultado = $link->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Formulario</title>
<style>
    body {
        background-color: #2AA250; /* Azul cielo */
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
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
</style>
</head>
<body>
<a href="index.php" style="color:white;">Home ||</a>
<a href="registrousfolio/index.php" style="color:white;">Registrar Usuario ||</a>
<a href="creaLicencia.php" style="color:white;">Registrar Licencia ||</a>
<a href="regisclave.php" style="color:white;">Registrar Placa ||</a>
<a href="buscadorInternolic.php" style="color:white;">Buscar Placa ||</a>
<a href="buscadorInterno.php" style="color:white;">Buscar Licencia ||</a>

<a href="cerrar_sesion.php" style="color:white;">Cerrar Sesion ||</a>

<form method="GET" action="upd1.php">      
        <input  type="text" name="serie"   placeholder="Escribe Serie" required>
        <button class="btn btn-dark">Editar/Eliminar</button>
      </form>
<br>
      <form method="GET" action="upd1.php">      
        <input  type="text" name="placa"   placeholder="Escribe Placa" required>
        <button class="btn btn-dark">Editar/Eliminar</button>
      </form> <br>
      <form method="post" action="qr.php">        
        <input  type="text" name="placa" id="placa" placeholder="placa"    required>
        <button class="btn btn-primary">Buscar compartir QR</button>
      </form>
    <center> <h1 style="color:white;">Lista de Tenencias</h1>
<table style="color:white; overflow-x: scroll;" border="2px">
    <thead>
        <tr >
            <th>Marca</th>
            <th>Tenencia</th>
            <th>Repuve</th>
            <th>Placa</th>  
            <th>Color Exterior</th>


        </tr>
    </thead>
    <tbody>
        <?php
        // Iterar sobre los resultados y mostrar cada fila en la tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td >" . $fila['Marca'] . "</td>";
            echo "<td>" . $fila['Tenencia'] . "</td>";
            echo "<td>" . $fila['Repuve'] . "</td>";
            echo "<td>" . $fila['Placa'] . "</td>";
            echo "<td>" . $fila['Color_Exterior'] . "</td>";
            // Continúa mostrando más columnas según tus necesidades
            echo "<td><a style='color:white;' href='upd1.php?placa=" . $fila['Placa'] . "'>Modificar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php
// Cerrar la conexión a la base de datos
$link->close();
?>


</body>
</html>
