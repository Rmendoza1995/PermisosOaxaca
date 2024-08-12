
<?php
	session_start();

include("configuracion.php");
$sqlfolio = "SELECT * FROM useros where usuario='".$_SESSION['usuario']."' limit 1";
$resultfolio = $link->query($sqlfolio);
$validar = !empty($_POST['validar']) ? $_POST['validar'] : (!empty($_GET['validar']) ? $_GET['validar'] : NULL);

if($validar=="true")
$Foliopermi = !empty($_POST['Foliopermi']) ? $_POST['Foliopermi'] : (!empty($_GET['Foliopermi']) ? $_GET['Foliopermi'] : $_GET['Foliopermi']);
else
$id = !empty($_POST['id']) ? $_POST['id'] : (!empty($_GET['id']) ? $_GET['id'] : $_GET['id']);

?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Actualizar datos</title>
<style>
    body {
        background-color: #0A2240; 
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    
    .container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        max-width: 700px;
        width: 100%;
    }
    
    .container img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .container img.first-image {
        width: 230px;
        max-height: 230px;
        object-fit: cover;
        object-position: center;
    }
    
    .labelest {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

    
    .estiloinputs {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        color: #333;
        width:80%;
        margin-bottom: 15px;
        text-align: center;
    }
</style>
</head>
<body>
    <div class="container">
        <?php
        date_default_timezone_set('America/Mexico_City');


        // Consulta para obtener los datos de todos los usuarios
        while ($row = $resultfolio->fetch_assoc()) {
            $levely = $row['levely'];
            if ($levely == 3) {
                echo "<a href='buscadorInterno.php'  class='btn btn-warning'  value='Regresar'> Regresar</a> <br><br>";
            } else {
                echo "<a href='buscadorInterno.php'  class='btn btn-warning'  value='Regresar'> Regresar</a> <br><br>";
            }
        }
        if($validar=="true")
        $sql = "SELECT * FROM creapermiso  WHERE Foliopermi = '$Foliopermi'";
        else
        $sql = "SELECT * FROM creapermiso  WHERE id = '$id'";

        $resultado = $link->query($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
                echo "<input type='hidden' name='id_eliminar' value='" . $fila['id'] . "'>";
                echo "<input type='submit' class='btn btn-danger' name='eliminar' value='Eliminar'>";
                echo "</form>";
                

                echo "<center><div>";
                echo "<form method='post' action='".$_SERVER["PHP_SELF"]."' enctype='multipart/form-data'>"; // Envía el formulario a la misma página
                echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>"; // Campo oculto para enviar el ID del registro
                
             

                echo "<span class='labelest'>Nombre:</span>";
                echo "<input type='text' name='propietario' class='estiloinputs' value='" . $fila['propietario'] . "' required><br>";
              

              
              
              
                
                echo "<span class='labelest'>version:</span>";
                echo "<input type='text' name='version' class='estiloinputs' value='" . $fila['version'] . "' required><br>";
                
                echo "<span class='labelest'>Año modelo:</span>";
                echo "<input type='text' name='anomodelo' class='estiloinputs' value='" . $fila['anomodelo'] . "' required><br>";
                
              
                echo "<span class='labelest'>marca:</span>";
                echo "<input type='text' name='marca' class='estiloinputs' value='" . $fila['marca'] . "' required><br>";
                
                echo "<span class='labelest'>numero serie:</span>";
                echo "<input type='text' name='numserie' class='estiloinputs' value='" . $fila['numserie'] . "' required><br>";
                
                echo "<span class='labelest'>motor:</span>";
                echo "<input type='text' name='motor' class='estiloinputs' value='" . $fila['motor'] . "' required><br>";
                
                echo "<span class='labelest'>color:</span>";
                echo "<input type='text' name='color' class='estiloinputs' value='" . $fila['color'] . "' ><br>";
                
                echo "<span class='labelest'>ciudad:</span>";
                echo "<input type='text' name='ciudad' class='estiloinputs' value='" . $fila['ciudad'] . "' ><br>";
                
                echo "<span class='labelest'>Folio permiso:</span>";
                echo "<input type='text' name='Foliopermi' class='estiloinputs' value='" . $fila['Foliopermi'] . "' ><br>";
                
                echo "<span class='labelest'>Modelo:</span>";
                echo "<input type='text' name='modelo' class='estiloinputs' value='" . $fila['modelo'] . "' ><br>";
                
                echo "<span class='labelest'>RFC:</span>";
                echo "<input type='text' name='rfc' class='estiloinputs' value='" . $fila['rfc'] . "' ><br>";
                
              
                echo "<span class='labelest'>vigencia:</span>";
                echo "<input type='text' name='vigencia' class='estiloinputs' value='" . $fila['vigencia'] . "' required><br>";
                
                echo "<span class='labelest'>Fecha de expedicion:</span>";
                echo "<input type='text' name='fecha_expedicion' class='estiloinputs' value='" . $fila['fecha_expedicion'] . "' required><br>";
                
               

                echo "<input type='submit' class='btn btn-success' name='actualizar' value='Actualizar'>"; // Botón de actualizar
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron Visas Registradas.";
        }
        ?>
    </div>
    
    <?php

if (isset($_POST['eliminar'])) {
    $id_eliminar = $_POST['id_eliminar'];
    
    // Consulta para eliminar el registro
    $sql_eliminar = "DELETE FROM creapermiso  WHERE id = $id_eliminar";

    if ($link->query($sql_eliminar) === TRUE) {
        echo "Registro eliminado correctamente.";
        // Redirigir o mostrar un mensaje, etc.
    } else {
        echo "Error al eliminar el registro: " . $link->error;
    }
}






 // Si se envió el formulario de actualización
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $propietario = $_POST['propietario'];
    $version = $_POST['version'];
    $anomodelo = $_POST['anomodelo'];
    $marca = $_POST['marca'];
    $numserie = $_POST['numserie'];
    $modelo = $_POST['modelo']; 
    $motor = $_POST['motor']; 
    $color = $_POST['color'];
    $ciudad = $_POST['ciudad'];
    $vigencia = $_POST['vigencia'];
    $CP = $_POST['CP'];
    $Foliopermi = $_POST['Foliopermi'];
    $fecha_expedicion = $_POST['fecha_expedicion'];

    

    // Consulta de actualización
    $sql = "UPDATE creapermiso    SET 
            propietario='$propietario',           
            version='$version', 
            numserie='$numserie', 
            anomodelo='$anomodelo', 
            marca='$marca', 
            motor='$motor', 
            color='$color',
            ciudad='$ciudad',
            vigencia='$vigencia',
            Foliopermi='$Foliopermi',
            fecha_expedicion='$fecha_expedicion'           
            WHERE id=$id";
var_dump($sql);
    // Ejecutar la consulta de actualización
    if ($link->query($sql) === TRUE) {
        echo "Registro actualizado.";
        echo "<script>alert('Registro Actualizado, si deseas consultarlo vuelve a buscarlo o crea uno nuevo.')</script>";
        $sqlfolio = "SELECT * FROM useros where usuario='".$_SESSION['usuario']."' limit 1";
$resultredirec = $link->query($sqlfolio);
        while ($row = $resultredirec->fetch_assoc()) {
            $levely = $row['levely'];
            if ($levely == 3) {
                echo "<script>window.location.href = 'buscadorInterno.php';</script>";
            } else {
                echo "<script>window.location.href = 'buscadorInterno.php';</script>";
            }
        }
      
    } else {
        echo "Error al actualizar el registro: " . $link->error;
    }
}

    ?>
</body>
</html>
