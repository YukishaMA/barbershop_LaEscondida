<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require_once("configuracion.php");
session_start();
class Barberia{
    var $db = null;
    
    public function conexion(){
        $dbh = SGBD.':dbname='.BD_name.';host-'.BD_host;
        try{
            $this->db = new PDO ( $dbh, BD_name, BD_password);    
        }catch(PDOException $e){
            echo "Imposible conectar";
        }  
    }
    
    public function alerta($mensaje,$tipo){
        include_once("view/mensajes.php");
    }
    
    public function alertaError($mensaje){
        $this->alerta($mensaje,'danger');
        include_once("view/header_error.php");
        include_once("view/footer.php");
        die();
    }
    
    public function cargarimg($carpeta){
        if (isset($_FILES["fotografia"])){
            $fotografia=$_FILES["fotografia"];
            if  ($fotografia["error"]==0){
                if  ($fotografia["size"]<=IMG_size){
                    if  (in_array($fotografia["type"],IMG)){
                        $origen=$fotografia["tmp_name"];
                        $numero=random_int(1, 100);
                        $destino = PATH.'images/'.$carpeta.'/'.$numero.'_'.$fotografia["name"];
                        if (move_uploaded_file($origen,$destino)){
                            return 'images/'.$carpeta.'/'.$numero.'_'.$fotografia["name"];
                        }
                    }
                }
            }
        }
        return false;
    }
    /*
    Funcion login para validar usuario y contraseña
    @PARAM string correo;
    @PARAM string contrasena_plana;
    @RETURN boolean;
    */
    public function login($correo,$contrasena){
        $contrasena = md5($contrasena);
        if($this->validateEmail($correo)){
            $sql = "select * from usuario where correo=:correo and contrasena=:contrasena";
            $leer=$this->db->prepare($sql);
            $leer->bindParam(':correo',$correo, PDO::PARAM_STR);
            $leer->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
            $leer->execute();
            $usuario= $leer->fetch(PDO::FETCH_ASSOC);
            if (isset($usuario['correo'])){
                $_SESSION['validado']=true;
                $_SESSION['correo']=$correo;
                $_SESSION['roles']= $this->roles($correo);
                $_SESSION['permisos']= $this->permisos($correo);
                return true;
            }
        }
        $this->logOut();
        return false;
    }
    
     public function validarToken($correo,$token){
        if($this->validateEmail($correo) && strlen($token)==16){
            $sql = "select * from usuario where correo=:correo and token=:token";
            $leer=$this->db->prepare($sql);
            $leer->bindParam(':correo',$correo, PDO::PARAM_STR);
            $leer->bindParam(':token',$token, PDO::PARAM_STR);
            $leer->execute();
            $usuario= $leer->fetch(PDO::FETCH_ASSOC);
            if (isset($usuario['correo'])){
                return true;
            }
        }
        return false;
    }
    
    /*
    funcion para terminar la sesion del usuario
    @RETURN boolean;
    */
    public function logOut(){
        if (isset($_SESSION['validado'])) unset($_SESSION['validado']);
        if (isset($_SESSION['correo'])) unset($_SESSION['correo']);
        if (isset($_SESSION['roles'])) unset($_SESSION['roles']);
        if (isset($_SESSION['permisos'])) unset($_SESSION['permisos']);
        session_destroy();
    }
    
    /*
    funcion para validar el usuario
    @RETURN boolean;
    */

    /*
    funcion para validar correo como expresion regular
    @PARAM varchar correo;
    @RETURN boolean;
    */

    /*
    funcion para obtener los roles de un correo
    @PARAM varchar correo;
    @RETURN roles[];
    */
    
    
    public function send_correo($destinatario,$asunto,$msj){
        require '../../vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = EMAIL_password;
        $mail->setFrom(EMAIL, 'Guadalupe');
        $mail->addAddress($destinatario, $destinatario);
        $mail->Subject = $asunto;
        $mail->msgHTML($msj);
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
    
    public function recuperar($correo){
        require '../../vendor/autoload.php';
        $sql='select correo from usuario where correo=:correo';
        $recupera=$this->db->prepare($sql);
        $recupera->bindParam(':correo',$correo, PDO::PARAM_STR);
        $recupera->execute();
        $recuperado= $recupera->fetchAll(PDO::FETCH_ASSOC);
        if($recuperado[0]['correo']){
            $token=substr(md5(md5($correo.random_int(1,100000).'golden'.md5(random_int(1,500))).soundex('uculele')),0,16);
            $sql='update usuario set token=:token where correo=:correo';
            $update=$this->db->prepare($sql);
            $update->bindParam(':correo',$correo, PDO::PARAM_STR);
            $update->bindParam(':token',$token, PDO::PARAM_STR);
            $update->execute();
            $mensaje = "
            <h2>Apreciable usuario presione el siguiente vilculo para reestablecer su contraseña.<h2><br><br><br>
            <a href=\"http://localhost/zoologico/admin/login.php?accion=restablecer&correo=$correo&token=$token\" target=\"_blank\">Recuperar contraseña</a>
            <br><br>
            Si usted no realizo esta acción por favor ignore este correo y contacte al administrador.
            ";
            $this->send_correo($correo, "Recuperación de contraseña", $mensaje);
            return true;
        }
        return false;
    }
    
    public function nuevaContrasena($correo,$contrasena,$token){
        $contrasena = md5($contrasena);
        $sql = "update usuario set contrasena=:contrasena, token=null where correo=:correo and token=:token";
        $cambio=$this->db->prepare($sql);
        $cambio->bindParam(':correo',$correo, PDO::PARAM_STR);
        $cambio->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
        $cambio->bindParam(':token',$token, PDO::PARAM_STR);
        $cuenta = $cambio->execute();
        return $cuenta;
    }
    
    public function pdf($orientacion, $tamano, $contenido, $nombre){
        require '../../vendor/autoload.php';
        error_reporting(E_ALL ^ E_WARNING);
        ob_clean();
        $html2pdf = new HTML2PDF($orientacion, $tamano, 'es');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($contenido);
        $html2pdf->Output($nombre);
        die();
    }
    
    public function json($datos,$status,$mensaje){ 
        ob_clean(); 
        header('Content-Type application/json; charset-utf-8'); 
        http_response_code($status); 
        array_push($datos,$mensaje); 
        $datos = json_encode($datos,JSON_PRETTY_PRINT); 
        echo $datos; 
    }
}

$Barberia = new Barberia;
$Barberia->conexion();
?>