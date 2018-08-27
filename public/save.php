<?php

$email = $_POST['email'];
$pass = $_POST['password'];
$nickname = $_POST['nickname'];
$toc = $_POST['tic-toc'];

if ($email) {

if ($pass != "") {

if ($toc !="") {

$length = rand(64,128);

$salt = hash('sha256', mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));

$foo = hash('sha256', "--" . $salt . "--" . $pass . "--");

require('db.php');

$sql = "INSERT INTO cas (email, password, encryption_salt, nickname) VALUES (?, ?, ?, ?)";

$stmt = $dbConnection->prepare($sql);
$stmt->bind_param('ssss', $email, $foo, $salt, $nickname);

if (!$stmt->execute()) {
    header('Location: https://login.creativecommons.org/error.html');
    exit;
}

$magic = $salt;

$subject = "Confirm your Creative Commons account";
$headers = "From: info@creativecommons.org\r\nReply-To: info@creativecommons.org";

$message = "Thanks for signing up for a Creative Commons account.\r\n\r\nTo confirm your account, please click the link below.\r\n\r\n<https://login.creativecommons.org/c.php?x=" . $magic . ">\r\n\r\nIf you did not request a Creative Commons account, please disregard this message.";

mail($email, $subject, $message, $headers);

$stmt->close();

header('Location: https://login.creativecommons.org/check.html');
exit;
}

}

}

header('Location: https://login.creativecommons.org/');


?>