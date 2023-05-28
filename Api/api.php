<?php

    include('../Config/config.php');
    
    class Apis{
      
      public function post_data($name,$email,$password){
         $config = new Config();
         
        
            if($name != null && $email != null && $password != null)
            {
                $res = $config->Insert_User($name,$email,$password);

                if($res)
                {
                    echo json_encode(['data'=>"Data Insert Sccfuuly"]);
                }
                else
                {
                    echo json_encode(['data'=> "Data Have User.."]);
                }
            }
             else
            {
                echo  json_encode([
                    'Error'=> "Enter Name,Email,PassWord",
                ]);
            }
        
      }

      public function get_data()
      {
        $config = new Config();

        $res = mysqli_fetch_all($config->Select_all_user());
        if($res)
        {
            echo json_encode(['Data' => $res ]);
        }
        else{
            echo json_encode(['Data'=> 'Data Not Found...']);
        }
      }

      public function Delete_data($id)
      {
        $config = new Config();
        $res = $config->delete_user($id);

        if($res)
        {
            echo json_encode(['data'=> "Delete Recode Scuufully"]);
        }
        else{
            echo json_encode(['data'=> "Not Foound..."]);
        }
      }
      public function Update_data($id,$name,$email,$password)
      {
        $config = new Config();
        $res = $config-> updata_user($name,$email,$password,$id);

        if($res)
        {
            echo json_encode(['data'=> "update Recode Scuufully"]);
        }
        else{
            echo json_encode(['data'=> "Not Foound..."]);
        }
      }
    }

?>