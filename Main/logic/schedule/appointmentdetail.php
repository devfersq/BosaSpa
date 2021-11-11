<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include("$path/Main/dbaccess/connection.php");
//include("$path/dbaccess/connection.php");

$idventa = $_POST['idVenta'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$importe = $_POST['importe'];
$fecha = $_POST['fecha'];
$nota = $_POST['nota'];

$query = "CALL Appointment_CreateDetail($idventa, '$producto', $precio, $importe, '$fecha', '$nota');";

$data = array();
$resultado = mysqli_query($conn, $query);
while ($row = $resultado->fetch_assoc()) {
    $data[] = $row;
}

$finalresult = ['data' => $data, 'errors' => [], 'responseCode' => 200];
echo json_encode($finalresult);

$conn->close();
?>