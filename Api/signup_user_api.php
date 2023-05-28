<?php

    header('Access-Control-Allow-Methods: *');
    header('Content-Type: application/json');

    include('api.php');

    $api = new Apis();

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $api->get_data();
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $api->post_data($_POST['name'],$_POST['email'],$_POST['password']);
    }
    else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
       $res =[];
       $id = file_get_contents('php://input');
       parse_str($id,$res);
      
       $api->Delete_data($res['id']);
    }
    else if($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH'){
    $res =[];
       $id = file_get_contents('php://input');
       parse_str($id,$res);
      
       $api->Update_data($res['id'],$res['name'],$res['email'],$res['password']);
    }else{
        echo json_encode(['data' => 'not fonubt']);
    }

?>