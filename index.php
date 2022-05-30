<?php require_once('php/conexion.php');

if (!isset($_SESSION)) {
    session_start();
} ?>
<?php
$codunicoinfor = '';
if (isset($_GET['clave'])) {
    $codunicoinfor = $_GET['clave'];
    $msgerror = false;
    if ($_GET['clave'] == '') {
        $msgerror = true;
    }
    if ($_GET['clave'] != '') {
        $query_listaa = "SELECT * FROM qrcode where clave = '$codunicoinfor'";
        $listaa = mysqli_query($conexion, $query_listaa) or die(mysqli_error());
        $qrvalido = false;
        if (mysqli_num_rows($listaa) == 0) {
            $qrvalido = true;
        } else {
            $query_lista = "SELECT qrcode.*, ingeniero.nombre, ingeniero.apellidos, biencatalogo.nombien, proveedor.razonsocial, supervisor.nombre_sup, supervisor.apellidos_sup, norma.nombnom FROM qrcode
            inner join ingeniero on qrcode.iding = ingeniero.iding
            left join biencatalogo on qrcode.iditem = biencatalogo.codbiencat
            left join proveedor on qrcode.idcliente = proveedor.idproveedor
            left join supervisor on qrcode.idsup = supervisor.idsup
            left join norma on qrcode.idnom = norma.idnom
            WHERE clave ='$codunicoinfor'";
            $lista = mysqli_query($conexion, $query_lista) or die(mysqli_error());
            $roowfila = mysqli_fetch_array($lista);
            $totalRows_lista = mysqli_num_rows($lista);
        }
    }
}


if (isset($_GET[''])) {
    $codunicoinfor = $_GET['clave'];
}


$query_lista = "SELECT qrcode.*, ingeniero.nombre, ingeniero.apellidos, biencatalogo.nombien, proveedor.razonsocial, supervisor.nombre_sup, supervisor.apellidos_sup, norma.nombnom FROM qrcode
inner join ingeniero on qrcode.iding = ingeniero.iding
left join biencatalogo on qrcode.iditem = biencatalogo.codbiencat
left join proveedor on qrcode.idcliente = proveedor.idproveedor
left join supervisor on qrcode.idsup = supervisor.idsup
left join norma on qrcode.idnom = norma.idnom
 WHERE clave ='$codunicoinfor'";
$lista = mysqli_query($conexion, $query_lista) or die(mysqli_error());
$roowfila = mysqli_fetch_array($lista);
$totalRows_lista = mysqli_num_rows($lista);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar QR</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="icon" sizes="10x16" href="assets/images/logo-ico.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/bootstrap.css">
</head>

<body>
    <header>
        <div class="nav-barr">
            <section class="header-section-logo">
                <a href="https://www.labteso.com"><img src="assets/images/logo-navbar.png" alt=""></a>
            </section>
            <section class="tittle-valid">
                <h3>Validación</h3>
            </section>
        </div>
    </header>
    <main>
        <section class="container-tittle">
            <h2>LABORATORIO TESO DE MEXICO S.A. DE C.V.</h2>
            <p>Validación de Autenticidad de Informes de Pruebas.</p>
        </section>
        <section class="section-one">
            <div class="container-valid-info">

                <div class="tittle-table">
                    <h4>
                        Empresa: <td><?php echo $roowfila['razonsocial']; ?></td>
                    </h4>
                </div>
                <form action="" class="fomulario-info">
                    <table>
                        <tr>
                            <td>No. de informe:</td>
                            <td><?php echo $roowfila['numinforme']; ?></td>
                        </tr>
                        <tr>
                            <td>Nombre Item:</td>
                            <td><?php echo $roowfila['nombien']; ?></td>
                        </tr>
                       
                        <tr>
                            <td>Norma:</td>
                            <td><?php echo $roowfila['nombnom']; ?></td>
                        </tr>
                       
                        
                        <tr>
                            <td><label for="upload-file">Adjunta Informe</label></td>
                            <td><input type="file" name="" id="upload-file"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <button type="button" class="btn button-validar" data-toggle="modal" data-target=".bd-example-modal-lg">Validar</button>                                
                            </td>
                            <?php include("php/modal.php");?>
                        </tr>
                    </table>

                </form>
                
            </div>
        </section>
        
    </main>
    <footer class="footer">
        <div class="footer-contact">
            <div class="container-footer">
                <div class="contact-form">
                    <div class="direction">
                        <h2>Dirección</h2>
                        <div class="direction-text">
                            <p>
                                Jacinto Canek 15-A <br>
                                Col. San Juan Ixhuatepec, C.P. 54180, <br>
                                Tlalnepantla, Edo. de México. <br>
                                <br>
                                <strong>TELS.: </strong> (55) 4426-1914, (55) 4426-4362, <br> (55) 4426-1034
                                Y (55) 4426-3060 <br>
                                <strong>Email: </strong> atencionaclientes@labteso.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.1567275952947!2d-99.1040339708082!3d19.51468099917737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f9e3ad19305b%3A0x897133b397a7bbf7!2sLaboratorio%20Teso%20de%20M%C3%A9xico!5e0!3m2!1ses!2smx!4v1636335669271!5m2!1ses!2smx" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-container">
            © Copyright 2021 - Laboratorio Teso de México S.A. de C.V.<br>
            Todos los derechos reservados.
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script src="assets/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.js"></script>


    <script>
        <?php if ($qrvalido == true) : ?>
            swal({
                type: "error",
                title: "¡El codigo Qr es invalido!",
                text: "Comunicate con atención a clientes.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            })
        <?php endif; ?>
    </script>

    <script>
        <?php if ($msgerror == true) : ?>
            swal({
                type: "error",
                title: "¡El codigo Qr es invalido!",
                text: "Comunicate con atención a clientes.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            })
        <?php endif; ?>
    </script>
</body>

</html>