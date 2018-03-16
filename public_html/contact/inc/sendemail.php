<?php 
  
/* send the submitted data */ 
    { 
    $name=$_REQUEST['name']; 
    $email=$_REQUEST['email'];
	$subject=$_REQUEST['subject']; 
    $message=$_REQUEST['message']; 
    if (($name=="")||($email=="")||($subject=="")||($message=="")) 
        { 
        echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
        } 
    else{         
        $from="From: $name<$email>\r\nReturn-path: $email"; 
        $subject="Message sent using your contact form"; 
        mail("secretary@spartansyouthfootball.com", $subject, $message, $from); 
        echo "Email sent! Please click the back arrow on your browser to return to the Spartans Youth Football website."; 
        } 
    }   


	$email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['comment'])){
          $email=$_POST['comment'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
	$secretKey = "6Lf27x0TAAAAADsrOnJFgmx1Z0fSrPyQEOk62PRi";
	$ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>Sorry that is not the key</h2>';
        } else {
          echo '<h2>Thanks for posting comment.</h2>';
        }
?>