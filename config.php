<?php
    $server='localhost';
    $user='root';
    $pass='';
    $db='contacts';

    $conn = new mysqli($server,$user,$pass,$db);

    if($conn->connect_error)
    {
        die("Coonection not done ".$conn->connect_error);
    }

    // Validation file will include whenevr config file will attached
    include('components/validation.php');

    session_start();
?>