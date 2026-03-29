<?php
$f=$_REQUEST['f'];
switch($f)
{
    case 'login':{
        
        require_once("views/sites/customer-login.php");
        break;
    }
    case 'logout':{
       unset($_SESSION['logincustomer']);
       header('location:index.php?opt=customer&f=login');
        break;
    }
    case 'register':{
        require_once("views/sites/customer-register.php");
        break;
    }
    case 'profile':{
        require_once("views/sites/customer-profile.php");
        break;
    }
    default:{
        require_once("views/sites/customer-profile.php");
        break;
    }
}
?>