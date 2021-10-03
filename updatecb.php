<?php
    include 'config.php';
    $id=$_GET["id"];

    if(isset($_POST['update']))
    {
        $sname=$_POST['studName'];
        if(isset($_POST['studCourses']))
        {
            $courses=implode(" ",$_POST['studCourses']);
        }
        else
        {
            $courses=null;
        }
        $sql="UPDATE demo SET sname='$sname',courses='$courses' WHERE id=$id";
        if($conn->query($sql)===TRUE)
        {
            echo "Data Updated";
        }
        else
        {
            echo "Error is ".$conn->error;
        }

    }
    
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
    <form action="" method="POST">
    
    <?php
        $sql1="SELECT * FROM demo WHERE id=$id";

        $result=$conn->query($sql1);

        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                $cList=explode(" ",$row['courses']);
                echo '<input type="text" placeholder="Enter student name" name="studName" value="'.$row['sname'].'"/><br><br>';
                    $myCources=['C','Java','PHP','MERN'];
                    foreach($myCources as $item)
                    {  
                        $checked='';
                       if(in_array($item,$cList)){
                           $checked='checked';
                       }
                       echo'<input type="checkbox" name="studCourses[]" value="'.$item.'" '.$checked.'/> '.$item.' Language <br><br>'; 
                    }

            }
        }
        else
        {
            echo "No data Found";
        }
        
    ?>
        <button type="submit" name="update">Update</button>
        <a href="checkBoxDataUpload.php">Back</a>
    </form>
</body>
</html>