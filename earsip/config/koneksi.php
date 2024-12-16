<?php

$server ="localhost";     // The server hosting the MySQL database. 'localhost' means the database is on the same server as the PHP script.
$user="root";             // The username used to connect to the MySQL database. 'root' is a common default for local development.
$pass="";                 // The password used to connect to the MySQL database. It's empty in this case, which is common in local environments.
$database="dbarsip";      // The name of the database you want to connect to, 'dbarsip' in this case.

$koneksi= mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($config));

?>
