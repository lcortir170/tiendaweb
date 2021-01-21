<?php

// Variables
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";
$busqueda = $_POST["ftext"];
$tipoBusqueda = $_POST["opcion"];
$sql = "SELECT * FROM clientes WHERE ";

// Establecer conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Error de conexión: ".mysqli_connect_error());
}

// Consulta para realizar la búsqueda en la base de datos
switch ($tipoBusqueda){
  case "onom":
    $sql = $sql."nombre like '%$busqueda%';";
  break;
  case "oape":
    $sql = $sql."apellidos like '%$busqueda%';";
  break;
  case "omail":
    $sql = $sql."email like '%$busqueda%';";
  break;
  case "odni":
    $sql = $sql."dni like '%$busqueda%';";
  break;
  default:
    echo "Se ha producido un error durante la búsqueda.";
}

$resultado = mysqli_query($conn, $sql);

// Consulta para realizar la busqueda en la base de datos
if (mysqli_num_rows($resultado) > 0) {
  // Salida de datos por cada fila
  while($row = mysqli_fetch_assoc($resultado)) {
    echo "- Nombre: ".$row["nombre"].", Apellidos: ".$row["apellidos"].", Email: ".$row["email"].", DNI: ".$row["dni"]."<br>";
  }
}else{
  echo "No se han encontrado resultados.";
}

mysqli_close($conn);

?>