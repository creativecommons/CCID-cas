<?php

$hash = $_POST['x'];
$global = $_POST['global'];
$verified = True;

if ($hash) {

if ($global != "") {

require('db.php');

$sql = "UPDATE cas set global = ?, verified = ? where encryption_salt = ?";

$stmt = $dbConnection->prepare($sql);
$stmt->bind_param('sis', $global, $verified, $hash);

if (!$stmt->execute()) {
    header("Location: https://login.creativecommons.org/c.php?e=1&x=" . $hash);
    exit;
}

header('Location: http://login.creativecommons.org/success.html');
exit;
}

}

header('Location: https://login.creativecommons.org/');


?>