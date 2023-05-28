<?php


    include('Config/config.php');

   $config = new Config();
    $k = true;
    if(isset($_REQUEST['btn_singup']))
    {
      $name     = $_REQUEST['name'];
      $email    = $_REQUEST['email'];
      $password = $_REQUEST['password'];
       $res= $config->Insert_User($name,$email,$password);
       $k = false;
    }

?>
