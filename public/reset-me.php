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