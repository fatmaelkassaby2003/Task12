<?php 
    include('./inc/header.php'); 
    include('./inc/nav.php');
    include('./config/conn.php');
    if(isset($_GET['page']))
    {
        switch($_GET['page']) 
        {
            case 'home':
                include('./view/home.php');
                break;
            case 'contact':
                include('./view/contact.php');
                break;
            case 'about':
                include('./view/about.php');
                break;
            case 'posts':
                include('./view/posts.php');
                break;
            default:
                include('./view/404.php');
                break;
        }
    }
    else
    {
        include('./view/home.php');
    }



    include('./inc/footer.php'); 
?>    