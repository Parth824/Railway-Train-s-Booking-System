<?php

    class Config
    {
     private  $SEVERNA = "localhost";
     private   $USERNAME = "root";
     private   $PASSWORD = "";
     private   $DATABASENAME = "railway_train";
     public $conn;

     public function Connection()
     {
        $this->conn = mysqli_connect($this->SEVERNA,$this->USERNAME,$this->PASSWORD,$this->DATABASENAME);

     }

     public function Insert_Data($name,$datetime,$to_city,$from_city,$class_id,$g_id,$t_id){
        $this->Connection();

        $qur = "Select * from price where class_id = $class_id and g_id = $g_id and t_id=$t_id";

        $p =mysqli_query($this->conn,$qur);
        $all_p = mysqli_fetch_assoc($p);

        if($all_p)
        {
            $p_id = $all_p['id'];
            $q = "insert into booking(name,p_id,datetime,to_city,from_city) values('$name',$p_id,'$datetime','$to_city','$from_city') ";
 
            $res = mysqli_query($this->conn,$q); 
         
            return $res;
        }
        return null;
     }

     public function all_select_recode()
     {
      $this->Connection();
        $q = "SELECT b.id,b.name as nameb,b.datetime,b.to_city,b.from_city,c.class,g.name,t.name as namet,p.totalprice
        FROM  booking b
        INNER JOIN price p
        ON b.id = p.id
        INNER JOIN all_classes c
        ON p.id = c.id
        INNER JOIN general g
        ON p.id = g.id
        INNER JOIN train t
        ON p.id = t.id
        ";

      $res = mysqli_query($this->conn,$q); 
         
      return $res;
     }

    public function delete_booking($id)
    {
      $this->Connection();

      $q = "Delete  from booking where id = $id";

      $res = mysqli_query($this->conn,$q);

      return $res;
    }
     public function Insert_User($name,$email,$passwrod)
     {
        $this->Connection();

        $hash = password_hash($passwrod,PASSWORD_DEFAULT);

        $q = "insert into user(name,email_id,password) values('$name','$email','$hash')";

        if($hash != null)
        {
          $res = mysqli_query($this->conn,$q); 
          return $res;
        }
        else
        {
            return false;
        }
     }

     public function Select_all_user(){
      $this->Connection();

      $q = "select * from user";

      $res = mysqli_query($this->conn,$q);

      return $res;
     }

     public function delete_user($id)
     {
      $this->Connection();

      $q = "Delete  from user where id = $id";

      $res = mysqli_query($this->conn,$q);

      return $res;
     }

     public function updata_user($name,$email,$password,$id)
     {
      $this->Connection();

      $q = "Update user set name = '$name', email_id = '$email', password = '$password' where id = $id";

      $res = mysqli_query($this->conn,$q);

      return $res;
     }

     public function all_get_class(){
      $this->Connection();

      $q = "select * from all_classes";

      $res = mysqli_query($this->conn,$q);

      return $res;
     }
     public function all_get_general(){
      $this->Connection();

      $q = "select * from general";

      $res = mysqli_query($this->conn,$q);

      return $res;
     }

     public function all_get_Train(){
      $this->Connection();

      $q = "select * from train";

      $res = mysqli_query($this->conn,$q);

      return $res;
     }

     
    }

?>