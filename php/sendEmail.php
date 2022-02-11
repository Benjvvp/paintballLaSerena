<?php
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_POST) {
  echo "
    <script>
      const boxNotifications = document.getElementById('boxNotifications');
      const alert = document.createElement('div');
      alert.className = 'alert alert-success';
      alert.innerHTML = 'Mensaje enviado correctamente.';
    </script>
  ";

  //Data from form
  $name = $_POST['nameInput'];
  $lastName = $_POST['lastNameInput'];
  $phone = $_POST['phoneInput'];
  $email = $_POST['emailInput'];
  $message = $_POST['messageInput'];
  //Split Name
  $nameSplitted = explode(' ', $name)[0];

  //Create a new PHPMailer instance
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'shared10.hostgator.cl';
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  $mail->Username = 'contacto@laserenapaintball.cl';
  $mail->Password = '5ag+0?843y8S';
  $mail->Subject = "Contacto desde la web [$nameSplitted]";
  $mail->setFrom('contacto@laserenapaintball.cl', "Paintball La Serena");
  $mail->isHTML(true);
  $mail->Body = "
      <html>
      <body style='margin: 0; padding: 0; box-sizing: border-box'>
    <div
      style='
        background: #f2f2f2;
        font-family: Arial;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        height: 100vh;
        width: 100vw;
      '
    >
      <table
        style='
          margin: 0 auto;
          width: 80%;
          max-height: 70%;
          background: white;
          overflow: auto;
          position: relative;
        '
      >
        <tbody style='margin: 0; padding: 0'>
          <tr>
            <td>
              <img
                src='https://i.ibb.co/Pcd5MsN/logocolorido.png'
                class='logo'
                alt=''
                srcset=''
                style='
                  display: block;
                  margin: 0 auto;
                  margin-top: 1em;
                  width: 100%;
                  max-width: 20em;
                '
              />
              <h1 class='title' style='text-align: center'>
                Hola!, hemos recibido un mensaje desde la web
              </h1>
              <div class='wrap-p' style='margin-top: 5em;text-align: left;margin-left: 2%;'>
                <p style='font-size: 20px; color: #444444'>
                  <strong>Nombre:</strong> $name
                </p>
                <p style='font-size: 20px; color: #444444'>
                  <strong>Apellido</strong> $lastName
                </p>
                <p style='font-size: 20px; color: #444444'>
                  <strong>Email:</strong> $email
                </p>
                <p style='font-size: 20px; color: #444444'>
                  <strong>Telefono:</strong> $phone
                </p>
                <p style='font-size: 20px; color: #444444'>
                  <strong>Mensaje:</strong> $message
                </p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
      </html>
      ";
  $mail->CharSet = 'UTF-8';
  $mail->addAddress('contacto@laserenapaintball.cl');

  //User email send
  $usermail = new PHPMailer();
  $usermail->isSMTP();
  $usermail->Host = 'shared10.hostgator.cl';
  $usermail->SMTPAuth = true;
  $usermail->SMTPSecure = 'ssl';
  $usermail->Port = 465;
  $usermail->Username = 'contacto@laserenapaintball.cl';
  $usermail->Password = '5ag+0?843y8S';
  $usermail->Subject = "Notificacion de correo";
  $usermail->setFrom('contacto@laserenapaintball.cl', "Paintball La Serena");
  $usermail->isHTML(true);
  $usermail->Body = "
      <html>
      <body style='margin: 0; padding: 0; box-sizing: border-box'>
    <div
      style='
        background: #f2f2f2;
        font-family: Arial;
        display: table-cell;
        vertical-align: middle;
        text-align: center;
        height: 100vh;
        width: 100vw;
      '
    >
      <table
        style='
          margin: 0 auto;
          width: 80%;
          max-height: 70%;
          background: white;
          overflow: auto;
          position: relative;
        '
      >
        <tbody style='margin: 0; padding: 0'>
          <tr>
            <td>
              <img
                src='https://i.ibb.co/Pcd5MsN/logocolorido.png'
                class='logo'
                alt=''
                srcset=''
                style='
                  display: block;
                  margin: 0 auto;
                  margin-top: 1em;
                  width: 100%;
                  max-width: 20em;
                '
              />
              <h1 class='title' style='text-align: center; color: #222222'>
                Hola!, hemos recibido tu mensaje correctamente 😄
              </h1>
              <h2 style='text-align: center; color: #222222'>
                Nos pondremos en contacto contigo lo antes posible.
              </h2>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr
            style='
              display: block;
              width: 100%;
              height: 10em;
              background-color: #222222;
            '
          >
            <td style='text-align: center; margin: 0 auto; display: block'>
              <h2
                style='
                  text-align: center;
                  color: white;
                  font-weight: bold;
                  margin-top: 1.2em;
                '
              >
                Paintball la serena
              </h2>
              <div
                style='
                  margin: 0 auto;
                  text-align: center;
                  display: inline-block;
                '
              >
                <div style='display: inline-block; margin-right: 0.2em'>
                  <a
                    href='https://www.facebook.com/Paintball-Pueblito-Pe%C3%B1uelas-104118858665819'
                    target='_blank'
                    rel='noopener noreferrer'
                    style='
                      text-decoration: none;
                      border: 2px solid white;
                      border-radius: 50%;
                      height: 3em;
                      width: 3em;
                      display: table-cell;
                      vertical-align: middle;
                      text-align: center;
                    '
                  >
                    <img
                      src='https://i.ibb.co/XzsvcGJ/logo-ig-instagram-new-logo-vector-download-5-1.png'
                      alt=''
                      srcset=''
                      style='width: 2em; height: 2em'
                    />
                  </a>
                </div>
                <div style='display: inline-block; margin-left: 0.2em'>
                  <a
                    href='https://www.instagram.com/paintball.pp/'
                    target='_blank'
                    rel='noopener noreferrer'
                    style='
                      text-decoration: none;
                      border: 2px solid white;
                      border-radius: 50%;
                      height: 3em;
                      width: 3em;
                      display: table-cell;
                      vertical-align: middle;
                      text-align: center;
                    '
                  >
                    <img
                      src='https://i.ibb.co/DRy8yyg/facebook-1.png'
                      alt=''
                      srcset=''
                      style='width: 2em; height: 2em'
                    />
                  </a>
                </div>
              </div>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </body>
      </html>
      ";
  $usermail->CharSet = 'UTF-8';
  $usermail->addAddress($email);
  if ($usermail->send() && $mail->send()) {
    header("Location: ../?success=true");
  } else {
    header("Location: ../?success=false");
  }
}
