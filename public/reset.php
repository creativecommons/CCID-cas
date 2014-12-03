<?php

/* CCID -- a CAS-based login system

   Copyright (C) 2014 Creative Commons

   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU Affero General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU Affero General Public License for more details.

   You should have received a copy of the GNU Affero General Public License
   along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

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

else 
    {
        header('Location: https://login.creativecommons.org/');
    }
?>
