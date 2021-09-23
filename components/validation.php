<?php
    function signupValid()
    {
        $errors=array();

        // For ProfileImage Validation <--- Code Starts Here
        global $path,$dir;
        
        $dir='uploads/profile/';
        $path=$dir.$_FILES['myFile']['name'];

        $ext = pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION);

        if($_FILES['myFile']['size']==null)
        {
            $errors['fileErr']="Profile image is mandatory";
        }
        else if($ext=='png'||$ext=='jpg'||$ext=='jpeg'||$ext=='svg')
        {
            if(!file_exists($path))
            {
                // file size is must written in bytes
                if($_FILES['myFile']['size']<!1000000)
                {
                   $errors['fileErr']="The limit file is exiced.The allowed size is 1 MB.";
                }
            }
            else
            {
                $errors['fileErr']="This file is already in uploaded.";
            }
        }
        else
        {
    
            $errors['fileErr']="This ".$ext." file type is not allowed";
        }
        // For ProfileImage Validation <--- Code Ends Here

        // For Name Validation <--- Code Starts Here

        if(!$_POST['fullname'])
        {
            $errors['nameErr']="Name could not be empty";
        }
        else if(!preg_match("#^[A-Za-z ]*$#",$_POST['fullname']))
        {
            $errors['nameErr']="Name can't be like this";
        }
        else if(strlen($_POST['fullname'])<=2)
        {
            $errors['nameErr']="Name could not be less than 2 Characters";
        }
        else if(strlen($_POST['fullname'])>50)
        {
            $errors['nameErr']="Name could not be more than 50 Characters";
        }

        // For Name Validation <--- Code Ends Here

        // For Email Validation <--- Code Starts Here

        if(!$_POST['email'])
        {
            $errors['emailErr']="Email could not be empty";
        }
        else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $errors['emailErr']="Not a valid email structure";
        }
        else if(strlen($_POST['email'])<=10)
        {
            $errors['emailErr']="Email could not be less than 10 Characters";
        }
        else if(strlen($_POST['email'])>100)
        {
            $errors['emailErr']="Email could not be more than 100 Characters";
        }

        // For Email Validation <--- Code Ends Here

        // For Mob Validation <--- Code Starts Here

        if(!$_POST['mobile'])
        {
            $errors['mobErr']="Mobile number coulde not be empty";
        }
        else if(!preg_match("#^[6-9]{1}[0-9]*$#",$_POST['mobile']))
        {
            $errors['mobErr']="Not valid mobile number";
        }
        else if(!strlen($_POST['mobile'])==10)
        {
            $errors['mobErr']="Mobile number should have 10 Numbers";
        }

        // For Mob Validation <--- Code Ends Here

        // For Password Validation <--- Code Starts Here

        if(!$_POST['pass'])
        {
            $errors['passErr']="Password could not be empty";
        }
        elseif(!preg_match("#[0-9]+#",$_POST['pass'])) {
            $errors['passErr'] = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$_POST['pass'])) {
            $errors['passErr'] = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$_POST['pass'])) {
            $errors['passErr'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['pass'])) {
            $errors['passErr']= "Your Password Must Contain At Least 1 Special Character !"."<br>";
        }
        else if(strlen($_POST['pass'])<=6)
        {
            $errors['passErr']="Password could not be less than 6 Characters";
        }
        else if(strlen($_POST['pass'])>=15)
        {
            $errors['passErr']="Password could not be more than 15 Characters";
        }
        // For Password Validation <--- Code Ends Here

        if(!$_POST['conf_pass'])
        {
            $errors['ConfPassErr']="Password could not be empty";
        }

        return $errors;
    }

    function signinValid(){
        $errors=array();
        // For Email Validation <--- Code Starts Here

        if(!$_POST['email'])
        {
            $errors['emailErr']="Email could not be empty";
        }
        else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $errors['emailErr']="Not a valid email structure";
        }
        else if(strlen($_POST['email'])<=10)
        {
            $errors['emailErr']="Email could not be less than 10 Characters";
        }
        else if(strlen($_POST['email'])>100)
        {
            $errors['emailErr']="Email could not be more than 100 Characters";
        }

        // For Email Validation <--- Code Ends Here

        // For Password Validation <--- Code Starts Here

        if(!$_POST['pass'])
        {
            $errors['passErr']="Password could not be empty";
        }
        elseif(!preg_match("#[0-9]+#",$_POST['pass'])) {
            $errors['passErr'] = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$_POST['pass'])) {
            $errors['passErr'] = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$_POST['pass'])) {
            $errors['passErr'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['pass'])) {
            $errors['passErr']= "Your Password Must Contain At Least 1 Special Character !"."<br>";
        }
        else if(strlen($_POST['pass'])<=6)
        {
            $errors['passErr']="Password could not be less than 6 Characters";
        }
        else if(strlen($_POST['pass'])>=15)
        {
            $errors['passErr']="Password could not be more than 15 Characters";
        }
        // For Password Validation <--- Code Ends Here

        return $errors;
    }
?>