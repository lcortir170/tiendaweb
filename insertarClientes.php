<?php

// Variables
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "pruebas";
$fdni = $_POST["fdni"];
$fnom = $_POST["fnom"];
$fape = $_POST["fape"];
$fmail = $_POST["fmail"];
$fdate = $_POST["fdate"];

// Establecer conexión con la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para realizar inserción a la base de datos
$sql = "INSERT INTO clientes (dni, nombre, apellidos, email, fechadenacimiento)
VALUES ('$fdni', '$fnom', '$fape', '$fmail', '$fdate')";

$resultado = mysqli_query($conn, $sql);

if ($resultado) {
  echo "Nuevo registro insertado correctamente.";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexion a la base de datos
mysqli_close($conn);

?>
