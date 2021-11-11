<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include("$path/Main/dbaccess/connection.php");
//include("$path/dbaccess/connection.php");

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$calle = $_POST['calle'];
$codigoPostal = $_POST['codigoPostal'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$fotoPerfil = $_POST['fotoPerfil'];
$fotoPiel = $_POST['fotoPiel'];
$documento = $_POST['documento'];
$activo = $_POST['activo'];

$query = "CALL Patient_Upsert($id, '$paterno', '$materno', '$nombres', '$genero', '$telefono', '$email', '$calle', '$codigoPostal', '$ciudad', '$estado', '$fotoPerfil', '$fotoPiel', '$documento', $activo);";
echo($query);
if($conn->query($query))
{
    echo json_encode(array('error' => false));
}
else
{
    echo json_encode(array('error' => true));
}

$conn->close();
?>