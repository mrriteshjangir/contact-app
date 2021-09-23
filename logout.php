<?php
    include('config.php');

    session_unset();

    session_destroy();

    if(isset($_COOKIE['email']))
    {
        setcookie('email','',time()-3600);
    }

    echo "
        <script>
            window.location='index.php';
        </script>
    ";

?>