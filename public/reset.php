<?php

$pass = $_POST['password'];
$old = $_POST['x'];

if ($pass != "") {

$length = rand(64,128);

$salt = hash('sha256', mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));

$foo = hash('sha256', "--" . $salt . "--" . $pass . "--");

require('db.php');

$sql = "SELECT email from cas WHERE encryption_salt = ?";

$stmt = $dbConnection->prepare($sql);
$stmt->bind_param('s', $old);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();



$sql = "UPDATE cas SET password = ?, encryption_salt = ? WHERE email = ? AND encryption_salt=?";

$stmt = $dbConnection->prepare($sql);
$stmt->bind_param('ssss', $foo, $salt, $email, $old);

if (!$stmt->execute()) {
    header('Location: https://login.creativecommons.org/error.html');
    exit;
}

$magic = $salt;

$subject = "Update to your Creative Commons account";
$headers = "From: info@creativecommons.org\r\nReply-To: info@creativecommons.org";

$message = "Your password has been reset on your Creative Commons ID. Thanks for supporting Creative Commons.";

mail($email, $subject, $message, $headers);

$stmt->close();

header('Location: https://login.creativecommons.org/');
exit;
 }
 else {

header('Location: https://login.creativecommons.org/');

 }

?>
