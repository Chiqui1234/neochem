<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('phpmailer/PHPMailer.php');
require('phpmailer/SMTP.php');
require('phpmailer/Exception.php');
if( !$_COOKIE['emailBlocker'] ) {
    // Check if all fields are completed
    $inputError = ( empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['email']) || empty($_POST['telephone']) || empty($_POST['message']) );
    // If all fields are ok, configure and send email
    if( !$inputError ) {
        $mail = new PHPMailer;
        // SMTP
        $mail->isSMTP();
        $mail->Host = 'in-v3.mailjet.com';
        $mail->SMTPAutoTLS = false; // Enable/disable SSL/TLS
        $mail->SMTPSecure = false; // Enable/disable SSL/TLS
        $mail->SMTPAuth = true;
        $mail->Username = '6f2597156ab75c36a3d751b0bed5e71d';
        $mail->Password = 'b0290be458c4e0af97a74fa2ff0cdb6c';
        $mail->Port = 587;
        // Encoding
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        // Mail
        $mail->setFrom('web@neochem.com.ar', 'Neochem Web');
        $mail->addAddress('santiagogimenez@outlook.com.ar', 'Santiago Gimenez');
        $mail->Subject = $_POST['name'].' te contactó por la web';
        $mail->isHTML(true);
        $mail->Body = '<head>
            <style>
                :root{--logo:#001D71;--black:rgb(30, 30, 30);--gray:rgb(100, 100, 100);--white:rgb(235, 235, 235);--white-alt:rgb(250, 250, 250);--white-transparent:rgba(255, 255, 255, .75);--red:rgb(255, 49, 59);--green:rgb(62, 243, 92);--blue:rgb(27, 20, 100);--blue-alt:rgb(34, 44, 179);--skyblue:rgb(26, 102, 241);--shadow:rgba(30, 30, 30, .4);--gap-xxl:40px;--gap-xl:20px;--gap:10px;--gap-sm:5px;--animation-timing:.5s;--animation-timing-sm:.25s}@font-face{font-family:"Poppins Light";src:url(http://neochem.com.ar/font/poppins-light.ttf)}@font-face{font-family:"Poppins Regular",sans-serif;src:url(http://neochem.com.ar/font/poppins-regular.ttf)}@font-face{font-family:"Poppins Semibold";src:url(http://neochem.com.ar/font/poppins-semibold.ttf)}@font-face{font-family:"Roboto Condensed";src:url(http://neochem.com.ar/font/roboto-condensed-bold.ttf)}h1,h2,h3,h4,h5,h6{font-family:\'Poppins Semibold\',sans-serif;font-display:auto;font-weight:500;color:var(--black);margin:20px 0 10px 0}a,p{font-display:auto;font-family:\'Poppins Regular\',sans-serif;font-weight:300;font-size:16px;line-height:32px;color:var(--black);display:block;clear:both}ol,ul{font-display:auto;font-family:\'Poppins Regular\',sans-serif;font-weight:300;color:var(--black);margin:var(--gap-xl);clear:both}a{color:var(--blue);text-decoration:none;display:inline;clear:none!important}a:hover{color:var(--blue-alt);border-color:var(--blue-alt)}ul li {margin-bottom: 10px}
            </style>
        </head>
        <body>
            <p>Te consulta por '.$_POST['subject'].'.</p>
            <ul>
                <li><strong>E-mail</strong>: '.$_POST['email'].'</li>
                <li><strong>Teléfono</strong>: '.$_POST['telephone'].'</li>
            </ul>
            <h2>'.$_POST['name'].' dice:</h2>
            <div id="message">
                <p>
                    '.$_POST['message'].'
                </p>
            </div>
        </body>';
        $emailSended = $mail->send();
        setcookie('emailBlocker', true, time() + 600);
    }
}
?>
<!-- Full screen notification -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neochem <?php if($_COOKIE['emailBlocker']) { echo '| No se puede enviar un email ahora'; } ?></title>
    <link rel="stylesheet" href="css/chunk.min.css" />
</head>
<body>
    <!-- <header id="header" class="darkLogo"> -->
    <header id="header">
        <div id="logo" class="logo">
            <a href="/"></a>
        </div>
        <ul id="nav" class="removeMobile minimal inline">
            <li>
                <a href="/#contacto">CONTACTO</a>
            </li>
            <li class="trigger">
                <a href="/colorantes">COLORANTES</a>
                <!-- Mega menu -->
<div id="megaMenu">
    <div class="left colorantes"></div>
    <div class="right wrapper grid center">
        <ul class="minimal grid-2">
            <li>
                <a href="/colorantes#directos">Directos</a>
            </li>
            <li>
                <a href="/colorantes#reactivos">Reactivos</a>
            </li>
            <li>
                <a href="/colorantes#dispersos">Dispersos</a>
            </li>
            <li>
                <a href="/colorantes#acidos">Ácidos</a>
            </li>
            <li>
                <a href="/colorantes#blancos-opticos">Blancos ópticos</a>
            </li>
            <li>
                <a href="/colorantes#basicos">Básicos</a>
            </li>
        </ul>
    </div>
</div>
            </li>
            <li class="trigger">
                <a href="/auxiliares">AUXILIARES</a>
                <!-- Mega menu -->
<div id="megaMenu">
    <div class="left auxiliares"></div>
    <div class="right wrapper grid center">
        <ul class="minimal grid-2">
            <li>
                <a href="/auxiliares#limpieza-descrude-blanqueo">Limpieza, descrude y blanqueo</a>
            </li>
            <li>
                <a href="/auxiliares#antiquebraduras">Antiquebraduras</a>
            </li>
            <li>
                <a href="/auxiliares#secuestrantes">Secuestrantes</a>
            </li>
            <li>
                <a href="/auxiliares#humectantes">Humectantes</a>
            </li>
            <li>
                <a href="/auxiliares#igualantes">Igualantes</a>
            </li>
            <li>
                <a href="/auxiliares#jabonado">Jabonado</a>
            </li>
            <li>
                <a href="/auxiliares#fijadores">Fijadores</a>
            </li>
            <li>
                <a href="/auxiliares#terminacion">Terminación</a>
            </li>
        </ul>
    </div>
</div>
            </li>
        </ul>
        <div class="menu removeDesktop">
            <a class="row cf" onclick="toggleSidebar()">
                <div class="three col">
                    <div id="hamburger" class="hamburger" style="padding-top: 5px">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </a>
        </div>
    </header>
    <nav id="sidebar" class="removeDesktop">
        <ul>
            <li class="auxiliares">
                <a href="/auxiliares" class="grid center">AUXILIARES</a>
            </li>
            <li class="colorantes">
                <a href="/colorantes" class="grid center">COLORANTES</a>
            </li>
            <li class="contacto">
                <a href="/#contacto" class="grid center">CONTACTO</a>
            </li>
        </ul>
    </nav>
    <script src="/js/headerCtrl.js"></script>
    <script src="/js/sidebarCtrl.js"></script>
    <script src="/js/checkIfClassExists.js"></script>
<div id="notification" class="grid center">

    <div class="container">
        <div class="img"></div>
        <div class="wrapper">
            <?php
            if($_COOKIE['emailBlocker']) {
            ?>
                <h2>No podés enviar otro email tan rápido</h2>
                <p>
                    Esperá al menos 10 minutos.
                </p>
            <?php
            } else if($inputError) {
            ?>
                <h2>Debés completar todos tus datos</h2>
                <p>
                    Necesitamos que escribas el Asunto, nombre, email, teléfono y mensaje; para que enviemos el email a la administración de la empresa.
                </p>
            <?php
            } else if($emailSended && !$inputError) {
            ?>
                <h2>Se envió el email</h2>
                <p>
                    Te vamos a contestar lo antes posible, gracias.
                </p>
            <?php 
            } else {
            ?>
                <h2>No pudo enviarse el email</h2>
                <p>
                    Intenta nuevamente en una hora. Disculpá las molestias.
                </p>
                <pre>
                    <?php 
                    //print_r($mail->ErrorInfo); 
                    ?>
                </pre>
            <?php 
            } 
            ?>
            <pre>
                <?php 
                echo $_POST['name'];
                echo $_POST['subject'];
                echo $_POST['email'];
                echo $_POST['telephone'];
                echo $_POST['message'];
                echo $inputError; 
                ?>
            </pre>
        </div>
    </div>

</div>
    <footer>
        <p>
            Neochem&copy 2011-2021
        </p>
    </footer>
</body>
</html>