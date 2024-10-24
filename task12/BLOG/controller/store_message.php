<?php 
session_start();
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    foreach($_POST as $key => $value)
    {
        $$key =htmlspecialchars(trim($value)); 

    }

    if(empty($name))
    {
        $errors['name'] = 'Name fields are required';
    }

    if(empty($email))
    {
        $errors['email'] = 'Email fields are required';
    }           

    if(empty($phone))
    {
        $errors['phone'] = 'Phone fields are required';
    }

    if(empty($message))
    {
        $errors['message'] = 'Message fields are required';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = 'Invalid email address';
    }

    if(empty($errors))
    {
        $sql = "INSERT INTO messages (`name`, `email`,`phone`, `message`) VALUES ('$name' , '$email','$phone', '$message')";

        $stmt = $conn->prepare($sql);

        $result=$stmt->execute();

        if($result)
        {
            $_SESSION['success'] = 'Message sent successfully';
            header("Location:./index.php?page=contact");
            exit();
        }
        else
        {
            die("505");
        }
    }
    else
    {
        $_SESSION['error'] = $errors;
        header("Location:./index.php?page=contact");
        exit();
    }
    
}
else
{
    include('../view/404.php');
}

?>