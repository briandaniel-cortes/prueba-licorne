<?php
include '../Conexion/Conexion.php';
$compra = $_POST["valoor"];
$inserta = mysqli_query($conexion,"INSERT INTO compra(`Compra`) VALUES ('$compra')");
header('Location: ./ListaCarrito.php');
?>