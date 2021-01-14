<?php

// Variables
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";
$busqueda = $_POST["busqueda"];
$tipoBusqueda = $_POST["tipoBusqueda"];
$sql = "SELECT * FROM productos WHERE ";

// Establecer conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Error de conexión: ".mysqli_connect_error());
}

// Consulta para realizar la búsqueda en la base de datos
switch ($tipoBusqueda){
  case "cod":
    $sql = $sql."cod = $busqueda;";
  break;
  case "descripcion":
    $sql = $sql."descripcion like '%$busqueda%';";
  break;
  case "precio":
    $sql = $sql."precio <= $busqueda;";
  break;
  default:
    echo "Se ha producido un error durante la búsqueda.";
}

$resultado = mysqli_query($conn, $sql);

// Consulta para realizar la busqueda en la base de datos
if (mysqli_num_rows($resultado) > 0) {
  // Salida de datos por cada fila
  while($row = mysqli_fetch_assoc($resultado)) {
    echo "- Código: ".$row["cod"].", Descripción: ".$row["descripcion"].", Precio: ".$row["precio"]."<br>";
  }
}else{
  echo "No se han encontrado resultados.";
}

mysqli_close($conn);

?>
