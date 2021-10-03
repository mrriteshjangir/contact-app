<?php
    include 'config.php';
    $cname=$_GET["cname"];
    $myCources=['C','Java','PHP','MERN'];
    
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,tr{
            border:1px;
        }
    </style>
</head>
<body>
    
    
    <?php
        
        foreach($myCources as $item)
            {  
                
                if($item==$cname){
                    echo "This course name is ".$item;
                }
                
                
            }
    ?>
        
        <a href="checkBoxDataUpload.php">Back</a>
    
</body>
</html>