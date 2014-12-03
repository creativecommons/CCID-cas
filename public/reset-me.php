<?php

$email = $_POST['email'];

require('db.php');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connection failed");
    exit();
}


$sql = "SELECT encryption_salt FROM cas WHERE email=?";

$stmt = $dbConnection->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($salt);
$stmt->fetch();

if ($salt) {

$magic = $salt;

$subject = "Password reset for your Creative Commons account";
$headers = "From: info@creativecommons.org\r\nReply-To: info@creativecommons.org";

$message = "Thanks for supporting Creative Commons.\r\n\r\nTo access your account, please click the link below.\r\n\r\n<https://login.creativecommons.org/p.php?x=" . $magic . ">\r\n\r\nIf you did not request a password reset, please disregard this message.";

mail($email, $subject, $message, $headers);

}

header('Location: /');



?>