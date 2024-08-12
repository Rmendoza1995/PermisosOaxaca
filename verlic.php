<?php
$Foliolic =!empty($_POST['Foliopermi']) ? $_POST['Foliopermi'] : (!empty($_GET['Foliopermi']) ? $_GET['Foliopermi'] : NULL);

?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Adeudo Tenencia</title>
<style>
    body {
        background-color: white; 
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
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

    .labelestR{
        font-size: 16px;
    font-weight: bold;
    color: red;
    margin-bottom: 5px;
    display: block;
    }
    .estiloinputs {
        background-color: #f8f8f8;
        padding: 10px;
        font-size: 16px;
        color: #333;
        width:80%;
        margin-bottom: 15px;
    }


    .miimglog {
    float: left; /* Para que la imagen se alinee a la izquierda */
    margin-right: 10px; /* Ajusta el margen derecho según sea necesario */
    margin-bottom: 10px; /* Ajusta el margen inferior según sea necesario */
}

.clearfix::after {
    content: "";
    display: table;
    clear: both;
}


    .contenedorreloj {
        text-align: center;
    }
    .imagen-border {
        border: 2px solid black; /* Borde negro de 2px */

        border-radius: 20px; /* Borde redondeado para la imagen */
        margin-bottom: 20px; /* Espacio entre la imagen y el contenido */
    }

    .contenido-border {
        border: 2px solid #ccc; /* Borde para el contenido */
        border-radius: 10px; /* Borde redondeado para el contenido */
        padding: 10px; /* Espaciado interno para el contenido */
        width: 300px; /* Ancho del contenedor del contenido */
        margin: auto; /* Centrar el contenido horizontalmente */
    }

    .labelest {
        display: block;
        font-weight: bold;
        margin-top: 10px; /* Espacio entre cada etiqueta y su contenido */
    }

    .estiloinputs {
        margin-bottom: 10px; /* Espacio entre cada contenido */
    }
    .responsive-img {
        max-width: 100%;
        height: auto;
    }
    @media only screen and (min-width: 600px) {
        .responsive-img {
            width:100%; /* Tamaño en dispositivos de pantalla grande */
            max-width: none; /* Restablecer el máximo ancho */
            height: 100px; /* Tamaño de altura en dispositivos de pantalla grande */
        }
    }
</style>
</head>
<body>

<?php
include("configuracion.php");
setlocale(LC_TIME, 'es_MX'); // Establece el locale a español para México

date_default_timezone_set('America/Mexico_City'); // Establece la zona horaria a CDMX

// Array que mapea los nombres de los meses en inglés a español
$meses = array(
    "January" => "ENERO",
    "February" => "FEBRERO",
    "March" => "MARZO",
    "April" => "ABRIL",
    "May" => "MAYO",    
    "June" => "JUNIO",
    "July" => "JULIO",
    "August" => "AGOSTO",
    "September" => "SEPTIEMBRE",
    "October" => "OCTUBRE",
    "enero" => "ENERO",
    "febrero" => "FEBRERO",
    "marzo" => "MARZO",
    "abril" => "ABRIL",
    "mayo" => "MAYO",
    "junio" => "JUNIO",
    "julio" => "JULIO",
    "agosto" => "AGOSTO",
    "septiembre" => "SEPTIEMBRE",
    "octubre" => "OCTUBRE",
    "noviembre" => "NOVIEMBRE",
    "diciembre" => "DICIEMBRE",
    "November" => "NOVIEMBRE",
    "December" => "DICIEMBRE"
);

$fecha_actual = strftime('%d DE %B DEL %Y'); // Formato: "02 DE ABRIL DEL 2024 a las 12:44 HRS"
// Reemplaza el nombre del mes en inglés por su equivalente en español
foreach ($meses as $mesIngles => $mesEspanol) {
    $fecha_actual = str_replace($mesIngles, $mesEspanol, $fecha_actual);
}
session_start();

$sql = "SELECT * FROM creapermiso WHERE Foliopermi = '$Foliolic'";
$resultado = $link->query($sql);
if ($resultado->num_rows > 0) {
    // Iterar sobre los resultados y mostrar cada fila en filas con colores alternados
    while ($fila = $resultado->fetch_assoc()) {
       
      
       
       
        echo "<div class='contenedor'>";

        echo "<div class='imagen-border'>";

        echo "<img src='logosmex/Oaxaca.png' class='responsive-img'><br>";
        echo "<div class='contenedorreloj'>";

echo $fecha_actual;
echo "</div >";
echo "</div >";
echo " <div class='contenido-border'>";
echo "<span class='labelestR'>DATOS DEL PERMISO PROVISIONAL PARA CIRCULAR SIN PLACAS Y TARJETAS DE CIRCULACIÓN DE SERVICIOS PARTICULAR VÁLIDO POR 30 DÍAS</span>";

        echo "<span class='labelest'>Popietario:</span>";
        echo "<div >" . $fila['propietario'] . "</div>";
      
        echo "<span class='labelest'>Rfc:</span>";
        echo "<div>" . $fila['rfc'] . "</div>";
        echo "<span class='labelest'>Fecha de Expedicion:</span>";
        echo "<div >" . $fila['fecha_expedicion'] . "</div>";
        echo "<span class='labelest'>Vigencia del permiso:</span>";
        echo "<div >" . $fila['vigencia'] . "</div>";
        echo "<span class='labelest'>Marca:</span>";
        echo "<div >" . $fila['marca'] . "</div>";
        echo "<span class='labelest'>Modelo:</span>";
        echo "<div >" . $fila['modelo'] . "</div>";
        echo "<span class='labelest'>Año/Modelo:</span>";
        echo "<div >" . $fila['anomodelo'] . "</div>";
        echo "<span class='labelest'>Color:</span>";
        echo "<div >" . $fila['color'] . "</div>";
      
        echo "<span class='labelest'>N° de serie:</span>";
        echo "<div >" . $fila['numserie'] . "</div>";    
        echo "<span class='labelest'>N° de motor:</span>";
        echo "<div >" . $fila['motor'] . "</div>";      
                echo "</div>";
    }
} else {
    echo "No se encontro Su Placa buscada , favor de revisar los datos.";

}

// Cerrar la conexión a la base de datos
$link->close();
?>

<script>
function compartir() {
    // Obtener los parámetros de código de envío y parte
    var codigoenvio = '<?php echo $codigoenvio; ?>';
    var parte = '<?php echo $parte; ?>';

    // Construir la URL actual con los parámetros
    var urlActual = "verget.php"; // URL sin parámetros
    var parametros = '?codigoenvio=' + codigoenvio + '&parte=' + parte;
    var urlCompartir = urlActual + parametros;

    // Verificar si el navegador admite la API de compartir
    if (navigator.share) {
        navigator.share({
            title: 'Compartir Datos',
            text: 'Compartir datos recibidos',
            url: urlCompartir
        })
        .then(() => console.log('Contenido compartido'))
        .catch((error) => console.error('Error al compartir:', error));
    } else {
        // En caso de que el navegador no admita la API de compartir, simplemente abre la URL en una nueva ventana
        window.open(urlCompartir, '_blank');
    }
}
</script>
</div>
</body>
</html>
