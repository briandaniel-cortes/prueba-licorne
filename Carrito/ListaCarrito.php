<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/AlertaEmergente.css">
    <title>Document</title>
</head>
<?php
include '../Conexion/Conexion.php';
include './Header.php';
$listardatos = "SELECT * FROM productos";
$Res_Consulta = $conexion->Query($listardatos);
?>

<body class="contenedor">


    <?php
    if (mysqli_num_rows($Res_Consulta) > 0) {

        while ($datos = mysqli_fetch_array($Res_Consulta)) {
    ?>

            <div id="myModal<?php echo $datos['id']; ?>" class="modal">
                <div class="modal-content">
                    <span class="close<?php echo $datos['id']; ?> close">&times;</span>
                    <div class="CajaProducto">
                        <div class="Titulo">
                            <h3><?php echo $datos['nombre_producto']; ?></h3>
                        </div>
                        <div class="FotoProducto"><img class="ImagenProducto" src='../Imagenes/<?php echo $datos['imagen']; ?>' alt=""></div>
                        <br>

                        <br>
                    </div>

                    <p id="myMensaje<?php echo $datos['id']; ?>"></p>
                    <button id="myBtnSi<?php echo $datos['id']; ?>">Si</button>
                    <button id="myBtnNo<?php echo $datos['id']; ?>">No</button>
                </div>
            </div>
            <div class="CajaProducto">
                <div class="Titulo">
                    <h3><?php echo $datos['nombre_producto']; ?></h3>
                </div>
                <div class="FotoProducto"><img class="ImagenProducto" src='../Imagenes/<?php echo $datos['imagen']; ?>' alt=""></div>
                <br>
                <Button class="Button" id="myBtn<?php echo $datos['id']; ?>">Comprar</Button>
                <br>
            </div><br>

            <?php

            echo '<script>
               
            </script>
            ';
            echo " ";
            ?>


            <script>
                var modal<?php echo $datos['id']; ?> = document.getElementById("myModal<?php echo $datos['id']; ?>");
                var btn<?php echo $datos['id']; ?> = document.getElementById("myBtn<?php echo $datos['id']; ?>");
                var btnSi<?php echo $datos['id']; ?> = document.getElementById("myBtnSi<?php echo $datos['id']; ?>");
                var btnNo<?php echo $datos['id']; ?> = document.getElementById("myBtnNo<?php echo $datos['id']; ?>");
                var span<?php echo $datos['id']; ?> = document.getElementsByClassName("close<?php echo $datos['id']; ?>")[0];
                // Get the button that opens the modal
                var mensaje<?php echo $datos['id']; ?> = document.getElementById("myMensaje<?php echo $datos['id']; ?>");

                // When the user clicks the button, open the modal 
                btn<?php echo $datos['id']; ?>.onclick = function() {
                    modal<?php echo $datos['id']; ?>.style.display = "block";
                    mensaje<?php echo $datos['id']; ?>.textContent = "Confirma Su pedido?";
                    btnSi<?php echo $datos['id']; ?>.style.display = "block";
                    btnNo<?php echo $datos['id']; ?>.style.display = "block";
                }

                btnSi<?php echo $datos['id']; ?>.onclick = function() {
                    mensaje<?php echo $datos['id']; ?>.textContent = "Proceso de compra finalizado";
                    btnSi<?php echo $datos['id']; ?>.style.display = "none";
                    btnNo<?php echo $datos['id']; ?>.style.display = "none";
                }

                btnNo<?php echo $datos['id']; ?>.onclick = function() {
                    mensaje<?php echo $datos['id']; ?>.textContent = "Compra Cancelada";
                    btnSi<?php echo $datos['id']; ?>.style.display = "none";
                    btnNo<?php echo $datos['id']; ?>.style.display = "none";
                }

                // When the user clicks on <span> (x), close the modal
                span<?php echo $datos['id']; ?>.onclick = function() {
                    modal<?php echo $datos['id']; ?>.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal<?php echo $datos['id']; ?>) {
                        modal<?php echo $datos['id']; ?>.style.display = "none";
                    }
                }
            </script>
    <?php
        }
    }

    ?>










</body>
<?php include './Footer.php'; ?>

</html>