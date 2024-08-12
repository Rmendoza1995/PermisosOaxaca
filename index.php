<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Buscadar Placa/Serie</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f2f2f2;
}
.container {
    width: 400px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}
.logo {
    width: 50%;
    margin-bottom: 20px;
}
.input-group {
    margin-bottom: 20px;
}
.input-group input {
    width: calc(100% - 40px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}
.input-group button {
    width: 70px;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}

/* Estilos para el modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 10px;
}

/* Estilos para el select */
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

</style>
</head>
<body>
<!-- Modal -->

<div class="container">

    <h2>Iniciar Sesion Permisos Oaxaca</h2>
<img src="logosmex/Oaxaca.png" width="400px">
    <form action="verificar.php" method="post">
        <div class="input-group">
        <input type="text" placeholder="Usuario" name="usuario" required="" />
     
   <div class="input-group">
   <input type="password" placeholder="Password" name="Password" required="" /><br>
           <br> <button type="submit">Login</button>
        </div>
    </form>
</div>

<script>
// Obtener el modal
var modal = document.getElementById("myModal");
var btnOpenModal = document.getElementById("openModal");
btnOpenModal.addEventListener("click", function() {
    modal.style.display = "block";
});
var storedState = localStorage.getItem("selectedState");
console.log(storedState)
// Mostrar el modal al cargar la página
window.onload = function() {
  if(storedState ==null){
    modal.style.display = "block";

  }else{
    modal.style.display = "none";


  }
}

// Guardar la selección en localStorage
document.getElementById("saveState").addEventListener("click", function() {
    var selectedState = document.getElementById("estado_ciudad").value;
    localStorage.setItem("selectedState", selectedState);
    modal.style.display = "none";
    loadLogo(selectedState);
});

// Cargar el logo según la selección guardada
function loadLogo(selectedState) {
    var logoPath = "logosmex/" + selectedState + ".png";
    document.getElementById("logo").src = logoPath;
}

// Comprobar si hay una selección guardada y cargar el logo correspondiente
if (storedState) {
    loadLogo(storedState);
}
</script>

</body>
</html>
