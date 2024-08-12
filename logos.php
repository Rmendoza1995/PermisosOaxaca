<?php
// Ruta de la carpeta que contiene las imágenes
$ruta_carpeta = 'qrurl/';

// Obtener la lista de archivos en la carpeta
$archivos = glob($ruta_carpeta . '*');

// Iterar sobre cada archivo en la carpeta
foreach ($archivos as $archivo) {
    // Verificar si es un archivo de imagen
    if (is_file($archivo) && exif_imagetype($archivo)) {
        // Mostrar la imagen
        echo '<img src="' . $archivo . '" alt="' . basename($archivo) . '" style="max-width: 300px; max-height: 300px;">';
        echo '<br>';
        // Agregar enlace de descarga
        echo '<a href="' . $archivo . '" download="' . basename($archivo) . '">Descargar ' . basename($archivo) . '</a>';
        echo '<br><br>';
    }
}
?>
