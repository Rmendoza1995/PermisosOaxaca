<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Datos para el QR
$recibeniv = !empty($_POST['Foliopermi']) ? $_POST['Foliopermi'] : (!empty($_GET['Foliopermi']) ? $_GET['Foliopermi'] : NULL);
$enlace = "https://permisos-oaxacagobmexico.com/verlic.php?Foliopermi=" . urlencode($recibeniv); // Eliminar las comillas simples y codificar la URL
//echo $enlace; 
// Incluir la librería PHP QR Code
require "phpqrcode/qrlib.php";
require "configuracion.php";
// Directorio donde se almacenarán los códigos QR generados
$dir = 'qrcodes/';

// Si el directorio no existe, crearlo
if (!file_exists($dir)) {
    mkdir($dir);
}

// Nombre del archivo QR (puedes personalizarlo según tus necesidades)
$nombreArchivo = $dir . 'qr_code_' . $recibeniv . '.png';
$tamañoModulo = 5;

// Generar el código QR directamente en el archivo
QRcode::png($enlace, $nombreArchivo, QR_ECLEVEL_L, 10, $tamañoModulo);

// Cargar la imagen del código QR
$codigoQR = imagecreatefrompng($nombreArchivo);
// Consulta SQL para obtener el estado_ciudad correspondiente a la placa

    // Guardar el código QR en un archivo temporal
    $nombreArchivoTemporal = $dir . 'qr_code_' . $recibeniv . '_temp.png';
    imagepng($codigoQR, $nombreArchivoTemporal);

    // Mostrar el código QR en una etiqueta img desde el archivo temporal
    echo '<img width="100px" src="'.$nombreArchivoTemporal.'" alt="Código QR">';
   // echo '<a href="'.$nombreArchivoTemporal.'" download="qr_code_'. $recibeniv .'_temp.png" style="font-size:20px;">Descargar QR</a>';




// Cerrar conexión a la base de datos
$link->close();

?>
