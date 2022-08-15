<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';



    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $nombre_fallecido = $_POST["nombre_fallecido"];
    $seccion = $_POST["seccion"];
    $fecha = $_POST["fecha"];
    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];
    $msg = $_POST["msg"];
    $contenido = "Nombre: ".$nombre."\n";
    $contenido .= "Correo: ".$email."\n";
    $contenido .= "Numero: ".$numero."\n";
    $contenido .=" Fallecido: ".$nombre_fallecido."\n";
    $contenido .= "Sección: ".$seccion."\n" ;
    $contenido .="Fecha: ".$fecha."\n"  ;
    $contenido .="Latitud: ".$latitud."\n"; 
    $contenido .="Longitud".$longitud."\n" ;
    $contenido .="Mensaje: ".$msg;


    $enviar = new PHPMailer(true);
    try{

        $enviar->SMTPDebug =  0;                   
        $enviar->isSMTP();                                         
        $enviar->Host       = 'smtp-mail.outlook.com';               
        $enviar->SMTPAuth   = true;                                  
        $enviar->Username   = 'ubicacioncementerio@outlook.com';           
        $enviar->Password   = 'Contrasenadificil123';                           
        $enviar->SMTPSecure = 'tls';          
        $enviar->Port       = 587 ;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $enviar->setFrom('ubicacioncementerio@outlook.com','Datos de soporte');
        $enviar->addAddress('anais.bustamante@unmsm.edu.pe');     //Add a recipient

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


        $enviar->isHTML(true);                                  
        $enviar->Subject = 'Asunto';
        $enviar->Body    = $contenido;
        $enviar->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $enviar->send();
        header("Location:gracias.html"); }catch (Exception $e) {
        echo "/nError de evío: {$enviar->ErrorInfo}";
    }
?>