<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Mexico_City');
session_start();

if (isset($_POST['enviar'])) {
    include("configuracion.php");
    if (!$link) {
        $msg = "Conexión imposible. Revise las credenciales de conexión";
    } else {

        $propietario = !empty($_POST['propietario']) ? $_POST['propietario'] : NULL;
        $version = !empty($_POST['version']) ? $_POST['version'] : NULL;
        $anomodelo = !empty($_POST['anomodelo']) ? $_POST['anomodelo'] : NULL;
        $marca = !empty($_POST['marca']) ? $_POST['marca'] : NULL;
        $numserie = !empty($_POST['numserie']) ? $_POST['numserie'] : NULL;
        $modelo = !empty($_POST['modelo']) ? $_POST['modelo'] : NULL;
        $motor = !empty($_POST['motor']) ? $_POST['motor'] : NULL;
        $color = !empty($_POST['color']) ? $_POST['color'] : NULL;
        $ciudad = !empty($_POST['ciudad']) ? $_POST['ciudad'] : NULL;
        $rfc = !empty($_POST['rfc']) ? $_POST['rfc'] : NULL;
        $fecha_expedicion = !empty($_POST['fecha_expedicion']) ? $_POST['fecha_expedicion'] : NULL;
        $vigencia = !empty($_POST['vigencia']) ? $_POST['vigencia'] : NULL;

        $fecha_convertida = date('d/m/Y', strtotime(str_replace('/', '-', $anomodelo)));
        $fecha_convertida_expedicion =  date('d/m/Y', strtotime(str_replace('/', '-', $fecha_expedicion)));
        $fecha_vigencia =  date('d/m/Y', strtotime(str_replace('/', '-', $vigencia)));

        

do {
    $Foliopermi = mt_rand(29414000, 59414999);

    // Realiza la consulta para verificar si el folio ya existe
    $sql_consulta_consecutivo = "SELECT Foliopermi FROM creapermiso WHERE Foliopermi = '$Foliopermi'";
    $resultado = mysqli_query($link, $sql_consulta_consecutivo);

    // Verifica si se encontró alguna coincidencia
    if(mysqli_num_rows($resultado) == 0) {
        // Si no se encontraron coincidencias, el folio es válido y se puede utilizar
        break;
    }
} while (true);
$Foliopermiconcero = '0' . $Foliopermi;


        // Consulta para obtener el valor actual de Num_folio para el usuario de la sesión
$sqlconsulta = "SELECT Num_folios FROM usuarioslicencias WHERE usuario = '" . $_SESSION['usuario'] . "'";
$resultado = mysqli_query($link, $sqlconsulta);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $num_folio_actual = intval($fila['Num_folios']); // Convertir a entero

    $num_folio_nuevo = $num_folio_actual - 1;
    echo     $num_folio_nuevo;
    $sqlactualizafolio = "UPDATE usuarioslicencias    SET Num_folios = $num_folio_nuevo WHERE usuario = '" . $_SESSION['usuario'] . "'";

    // Ejecutar la consulta de actualización
    mysqli_query($link, $sqlactualizafolio);
} else {
    // Manejar cualquier error en la consulta
    echo "Error: " . mysqli_error($link);
}

$sql = "INSERT INTO creapermiso 
(propietario,usuario, version, anomodelo, marca, numserie, modelo, motor, color, ciudad, vigencia, Foliopermi, rfc, fecha_expedicion)
VALUES 
('$propietario', '{$_SESSION['usuario']}', '$version', '$anomodelo', '$marca', '$numserie', '$modelo', '$motor', '$color', '$ciudad', '$fecha_vigencia', '$Foliopermiconcero', '$rfc', '$fecha_convertida_expedicion')";

var_dump($sql);

if ($link->query($sql) && $link->affected_rows > 0) {
    echo '<script type="text/javascript">
    alert("Registro Exitoso de licencia.");
    alert("Direccionando al Formato de pago");
    window.location.href="formatopago.php?Foliopermi=' . $Foliopermiconcero . '"; 
  </script>';

        } else {
            $msg = "Error en la inserción";
        }
    }
}
