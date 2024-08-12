<?php
session_start();

include("configuracion.php");
if (!isset($_SESSION['usuario'])) {
	// El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
	echo '<script type="text/javascript">
            alert("Usted No tiene Permitido el Acceso a esta parte.");
            window.location.href="registrousfolio/IniciarSesion.php";
          </script>';
	exit; // Salir del script para evitar que el resto del código se ejecute
}




$sqlfolio = "SELECT * FROM useros where usuario='" . $_SESSION['usuario'] . "' limit 200";
$resultfolio = $link->query($sqlfolio);

if ($resultfolio->num_rows > 0) {
	while ($row = $resultfolio->fetch_assoc()) {
		$numFolios = $row['Num_folios'];
		$levely = $row['levely'];

		if ($numFolios == 0) {
			echo "<script>alert('Ya no tienes más folios. Comunícate para solicitar más.');</script>";
			echo "<script>window.location.href = 'buscadorInterno.php';</script>";
		}


		if ($levely == 3) {
			echo '<a href="buscadorInterno.php"  style="color: white;">Buscar Permiso</a>  ||';
		} else {
			echo '<a href="buscadorInterno.php" style="color: white;">Buscar Permiso</a> || ';

			echo '<a href="admin.php" style="color: white;">Buscar Usuario</a>  ||';
		}
	}
} else {
	// Si no hay resultados de la consulta, puedes manejarlo de acuerdo a tus necesidades
	echo "No se encontraron resultados.";
}

?>

<!DOCTYPE HTML>
<html lang="es">

<head>
	<title>Registrar Permisos</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Account Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="registrousfolio/css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="registrousfolio/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
	<link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

	<!-- //css files -->
</head>

<body>
	<!-- main -->
	<div class="w3ls-header">
		<h1>Crear Permiso Nuevo</h1>
		<div class="header-main">

			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="permisoregis.php" method="post" enctype="multipart/form-data">
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="Nombre Completo" name="propietario" required="" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="RFC" name="rfc" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="marca" name="marca" required="" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="numserie" name="numserie" required="" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="version" name="version" required="" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="modelo" name="modelo" required="" />
							</div>

							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="anomodelo" name="anomodelo" required="" />
							</div>

							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="motor" name="motor" required="" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="color" name="color" required="" />
							</div>

							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="ciudad" name="ciudad" required="" />
							</div>





	
<div class="icon1">
    <i aria-hidden="true"></i>Fecha Expedicion (Dia de registro)
    <input id="fecha_expedicion" onchange="validarFecha()" type="date" placeholder="" name="fecha_expedicion" required="" />
</div>

<div class="icon1">
    <i aria-hidden="true"></i>Vigencia (Caduca el dia?)
    <input id="vigencia" onchange="validarFecha()" type="date" placeholder="" name="vigencia" required="" />
</div>
<script>
    function validarFecha() {
        // Obtener referencia a los elementos de fecha
        var fechaVigencia = document.getElementById("vigencia");
        var fechaExpedicion = document.getElementById("fecha_expedicion");

        // Convertir las cadenas de fecha en objetos Date
        var vigenciaDate = new Date(fechaVigencia.value);
        var expedicionDate = new Date(fechaExpedicion.value);
        
        // Verificar si la fecha de expedición es mayor o igual que la fecha de vigencia
        if (expedicionDate >= vigenciaDate) {
            // Mostrar alerta si la fecha de expedición es incorrecta
            alert("La fecha de expedición debe ser menor que la fecha de vigencia");
            // Restaurar el valor del campo de fecha de expedición
            fechaExpedicion.value = "";
        }
    }
</script>






















							<!--div class="icon1">
								<i aria-hidden="true"></i>
								<label for="estado_ciudad">Estado/Ciudad:</label>
								<select name="estado_emision" id="estado_emision">
									<option value="">Selecciona Estado/Ciudad</option>
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="bajacalifornia">Baja California</option>
									<option value="bajacaliforniasur">Baja California Sur</option>
									<option value="Campeche">Campeche</option>
									<option value="Chiapas">Chiapas</option>
									<option value="Chihuahua">Chihuahua</option>
									<option value="Coahuila">Coahuila</option>
									<option value="Colima">Colima</option>
									<option value="Durango">Durango</option>
									<option value="Guanajuato">Guanajuato</option>
									<option value="Guerrero">Guerrero</option>
									<option value="Hidalgo">Hidalgo</option>
									<option value="Jalisco">Jalisco</option>
									<option value="edomex">Estado de México</option>
									<option value="Michoacan">Michoacán</option>
									<option value="Morelos">Morelos</option>
									<option value="Nayarit">Nayarit</option>
									<option value="Nuevoleon">Nuevo León</option>
									<option value="Oaxaca">Oaxaca</option>
									<option value="Puebla">Puebla</option>
									<option value="Queretaro">Querétaro</option>
									<option value="QuintanaRoo">Quintana Roo</option>
									<option value="Sanluispotosi">San Luis Potosí</option>
									<option value="Sinaloa">Sinaloa</option>
									<option value="Sonora">Sonora</option>
									<option value="Tabasco">Tabasco</option>
									<option value="Tamaulipas">Tamaulipas</option>
									<option value="Tlaxcala">Tlaxcala</option>
									<option value="Veracruz">Veracruz</option>
									<option value="Yucatan">Yucatán</option>
									<option value="Zacatecas">Zacatecas</option>
									<option value="CDMX">Ciudad de México</option>
								</select>






							</div-->



							<div class="bottom">
								<input type="submit" name="enviar" value="Crear Licencia" />
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--header end here-->
	<!-- copyright start here -->

	<!--copyright end here-->
</body>

</html>