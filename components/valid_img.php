<?php
    $path=$dir.$_FILES['profile_img']['name'];

    $ext = pathinfo($_FILES['profile_img']['name'], PATHINFO_EXTENSION);

    if($ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='svg')
    {
        if(!file_exists($path))
        {
            if($_FILES['profile_img']['size']<=2000000)
            {
                move_uploaded_file($_FILES['profile_img']['tmp_name'],$path);
            }
            else{
                echo "Limmit exicced";
            }
        }
        else
        {
            echo "imge alrdy present";
        }
    }
    else
    {
        echo "This ".$ext." file type is not allowed";
    }
?>