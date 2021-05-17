<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include_once("config/Conexion.php");
require "config/phpmaile/Exception.php";
require "config/phpmaile/PHPMailer.php";
require "config/phpmaile/SMTP.php";

header("Content-Type: aplication/json");
$user = new User();
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      $email = isset($_GET['email']) ? $_GET['email'] : '';
      $pass = isset($_GET['password']) ? $_GET['password'] : '';
      $getUser = $user->getallUser($email ,$pass);
      echo $getUser;
    break;

    case 'POST':
      //$_POST = json_decode(file_get_contents('php://input'), true);
      if($_GET['method']=='newUser'){
        $storeuser= $user->storeUser($_POST);
        echo $storeuser;
      } else if($_GET['method']=='sendemail'){
        $sendEmail = $user->sendEmail($_POST);
        echo $sendEmail;
      }
    break;

    case 'PUT':
      $_POST = json_decode(file_get_contents('php://input'), true);
    break;

    case 'DELETE':
      $_POST = json_decode(file_get_contents('php://input'), true);
    break;
  }


  class User{
    private $con;
    private $request = array();

    public function __construct(){
      $conexion = $this->con = new Conexion();
      $this->con = $conexion->conectar();
    }
    public function getallUser($user,$pass){

      try {
        if($user == ''){
          $request['code'] = 202;
          $request['status'] = "success";
          $request['msm'] = 'El correo es requerido'; //'El correo es requerido';
        } else{
          if($pass == ''){
            $request['code'] = 202;
            $request['status'] = "success";
            $request['msm'] = 'La contraseña es requerido';
          } else{
            $password = password_verify($pass, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM users WHERE email='" . $user . "' ";

            $result = $this->con->query($sql);
            $respuesta = $result->fetch_row();
            //print_r($respuesta);
            if(isset($respuesta)){
              if(password_verify($pass, $respuesta[4])){
                // creacion de sessiones

                $request['code'] = 200;
                $request['status'] = "success";
                $request['id'] = $respuesta[0];
                $request['nombre'] = $respuesta[1];
                $request['email'] = $respuesta[2];
              } else{
                $request['code'] = 202;
                $request['status'] = "success";
                $request['msm'] = "contraseña incorrecta";
              }
            } else{
              $request['code'] = 200;
              $request['status'] = "warning";
              $request['msm'] = "No existe usuario";
            }


          }
        }

      } catch (Exception $e) {
          $request['code'] = 500;
          $request['status'] = "error";
          $request['msm'] = $e->getMessage();
      }

      return json_encode($request);
    }
    public function storeUser($params){
      try {
        //$password = hash('sha512',__SALT__,$params['password']);
        $password = password_hash($params['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name,email,password,created_at,updated_at)VALUES('". $params['name'] ."','". $params['emails'] ."','". $password ."','". date('Y-m-d H:m:s') ."','".date('Y-m-d H:m:s')  ."')";
        $sqlexist = "SELECT * from users WHERE email= " . '"' .$params['emails'] . '"';

        $resultexist = $this->con->query($sqlexist);

        if($resultexist->num_rows == 0){

          $result = $this->con->query($sql);
          if($result == 1){
            $request['code'] = 200;
            $request['status'] = "success";
            $request['msm'] = "Usuario registrado con exito";
          } else{
            $request['code'] = 202;
            $request['status'] = "warning";
            $request['msm'] = "Tubimos un problema al insertar el usuario";
          }
        } else{

          $request['code'] = 202;
          $request['status'] = "warning";
          $request['msm'] = "El correo ya existe";
        }

      } catch (Exception $e) {
        $request['code'] = 500;
        $request['status'] = "error";
        $request['msm'] = $e->getMessage();
      }

      return json_encode($request);
    }
    public function sendEmail($params){
      try {

        $from = "elmonjo19@gmail.com";
        $correoPersonal = "elmonjo19@live.com.mx";
        $nombre = isset($params['namefull']) ? $params['namefull'] : '';
        $correo = isset($params['emailcontract']) ? $params['emailcontract'] : '';
        $phone = isset($params['phonecontact']) ? $params['phonecontact'] : '';
        $day = isset($params['dateevento']) ? $params['dateevento'] : '';
        $adress = isset($params['address']) ? $params['address'] : '';
        $comentario = isset($params['comentariocontact']) ? $params['comentariocontact'] : 'Quiero recibir informacion de promocion';

      $content =  '
            <div id="container-email">
              <div class="container">
                <div class="row">
                  <img src="https://www.doctajazz.com/wp-content/uploads/2020/04/mejores-saxofonistas-de-la-historia.jpg" alt="" id="imglogo">
                </div>
                <br>
                <p class="tittle-principal">Hola mi nombre es <a href="#">'.$nombre.'</a> te mando este mensaje por que quiero recibir informacion a mi correo <a href="mailto:'. "'.$correo.'" .'">'.$correo.'</a></p>
                <p class="tittle-principal">o a mi celular <a href="tel:+52'.$phone.'">'.$phone.'</a>acerca de los paquetes que tienes para eventos familiares de musica de sansofonista.</p>
                <p class="tittle-principal">Me gustaria que fuera el dia <a href="#"> '.$day.'</a> en la direccion <a href="#"> '.$adress.'</a> de antemano gracias por su apoyo.</p><br><br>
                <p class="tittle-principal">'.$comentario.'</p>
              </div>
            </div>
            <style>
              #container-email{
                background-color: black;
                height: 100vh;
                background-size:cover;
                position: relative;
                padding: 0;
              }
              #imglogo{
                width: 20vh;
                height: 20vh;
                margin-left: 40%;
              }

              .tittle-principal{
                color: white;
              }

            </style>
      ';
        $mail = new PHPMailer(true);
        $responseemail = "";


        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //'smtp.live.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $from;                     //SMTP username
            $mail->Password   = 'Lrvaja37';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //$mail->setFrom('elmonjo19@live.com.mx', 'Luis Ramon Valencia');
            //$mail->addAddress( $correo);     //Add a recipient
            $mail->setFrom($from , 'Luis Ramon Valencia'); // el correo se envia a leo a su correo personal
            $mail->addAddress($correoPersonal); // este es el correo del sitio web

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Contrato de sansofon';
            $mail->Body    = $content;

            $mail->send();
          //  $responseemail = 'Message has been sent';
            $request['code'] = 200;
            $request['status'] = "success";
            $request['msm'] = "Mensaje enviado";

        } catch (Exception $e) {
            // $responseemail = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $request['code'] = 500;
            $request['status'] = "error";
            $request['msm'] = $e->getMessage();
        }

        //$request['data'] = $params;
      } catch (Exception $e) {
        $request['code'] = 500;
        $request['status'] = "error";
        $request['msm'] = $e->getMessage();
      }
      return json_encode($request);

    }
  }
 ?>
