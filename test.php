<?php


$servername = "localhost";
$username = "root";
$password = "legolas4129";
$dbname = "mediciones";

// Se establece la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Se chekea la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$nombre = $_GET['nombre'];
//$fecha = $_GET['fecha'];
$value1 = $_GET['value1'];
$fecha = date("Y-m-d");

//Inserta en la base de datos
$sql = "INSERT INTO test (fecha,time, value1)
VALUES ('$fecha',NOW(),".$value1.")"; // Al final de cada sentencia debe ir '".$variable."'


if ($conn->query($sql) === TRUE) {
    echo "Datos insertados Correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

