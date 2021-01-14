<?php

// Variables
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";
$codigo = $_POST["cod"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

// Establecer conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para realizar inserción a la base de datos
$sql = "INSERT INTO productos (cod, descripcion, precio)
VALUES ('$codigo', '$descripcion', '$precio')";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
  echo "Nuevo registro insertado correctamente.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexion a la base de datos
mysqli_close($conn);

?>
