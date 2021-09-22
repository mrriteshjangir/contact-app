<?php
    include('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <img src="<?php echo $_SESSION['user']['photo']?>" height="200px"/>
        <h2>Hellow, <?php echo $_SESSION['user']['fullname']; ?></h2>
        <p> <?php echo $_SESSION['user']['email']; ?></p>
        <p><?php echo $_SESSION['user']['created']; ?></p>
        <p><?php echo $_SESSION['user']['mobile']; ?></p>
    </body>
</html>