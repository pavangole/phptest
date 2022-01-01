<?php
$username = posix_getpwuid(posix_geteuid())['name'];
echo $username;

?>
