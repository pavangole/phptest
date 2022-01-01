<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['b'];
            exec ("sudo docker stop $id 2>&1", $output, $result);
            echo "Server Stopped Successfully.";
            }
?>


