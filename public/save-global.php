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