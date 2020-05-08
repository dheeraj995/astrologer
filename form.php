<!DOCTYPE html>
<html>

<body>



<?php
/*ini_set("SMTP","ssl:smtp.gmail.com" );
ini_set('smtp_port',465);*/
$name = $message = $subject = $email = "";
$nameErr = $messageErr = $subjectErr = $emailErr  = "";

if (strtoupper($_SERVER["REQUEST_METHOD"]) == "POST") {

    if (empty($_POST["name"] || $_POST["name"]==" ")) {
    $nameErr = "Name is required";
  } else {
    $name = form($_POST["name"]);
    // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     $nameErr = "Only letters and white space allowed"; }
  }

   if (empty($_POST["subject"])) {
    $subjectErr = "Required";
  } else {
    $subject = form($_POST["subject"]);
  }
  if (empty($_POST["message"])) {
    $messageErr = "Required";
  } else {
    $message = form($_POST["message"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Required";
  } else {
    $email = form($_POST["email"]);
  }

  }

function form($data) {

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}

$to = "wedokickassmarketing@gmail.com";
$subject = "Contact Astrologer Dushyant Sharama";
$msg = "Hi, \n\r  My name is :". $name." \n\r Subject :".$subject. " \n\r And My Mobile Number is :".$mobile. " \n\r And My Mail Id is :" .$email. " \n\r Message :" . $message;
$headers = "From:"  .$email.  "\r\n";
$headers .= "To: ".$to."\n";
$headers .= "Organization: Astrologer Dushyant Sharma\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;



mail($to,$subject,$msg,$headers, "-f wedokickassmarketing@gmail.com");
echo '<script type="text/javascript">alert("Successfull!!");window.location.href="index.html";</script>';
?>


</body>

</html>