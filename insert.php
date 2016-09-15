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
$value1 = $_GET['value1'];
$value2 = $_GET['value2'];
$category  = $_GET['category'];

//Inserta en la base de datos
$sql = "INSERT INTO my_chart_data (category, value1, value2)
VALUES ('".$category"',".$value1.",".$value1.")"; // Al final de cada sentencia debe ir'".$variable."'


if ($conn->query($sql) === TRUE) {
    echo "Datos insertados Correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

