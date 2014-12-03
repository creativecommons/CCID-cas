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