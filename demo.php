<?php

    include('Config/config.php');

   $config = new Config();
    $k = true;
    if(isset($_REQUEST['btn_singup']))
    {
        // $name     = $_REQUEST['name'];
        // $email    = $_REQUEST['email'];
        // $password = $_REQUEST['password'];
        // $res= $config->Insert_User($name,$email,$password);
        $k = false;
        
    }

?>

<!DOCTYPE html>
<html>
<head>
     
    <title>Sing In and Sing up</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet'   href='style.css'>
    <script src="https://kit.fontawesome.com/d7c1d7d821.js" crossorigin="anonymous"></script> 
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 id = "title">
                Sing Up
            </h1>
            <form action="" method="GET">
                <div class="input-group">
                    <div class="input-field" id = "nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" name = "name">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name = "email">
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name = "password">
                    </div>
                    <p>Lost password <a href="#">Click Here!</a></p>
                    <br/>
                    <div class="btn-fields">
                        <button id = 'btn_my' name = <?php if($k){echo "btn_singup";} else{echo "btn_singin";}?>>Sing Up</button>
                     </div>
                </div>
                
                <div class="btn-field">
                    <button type="button" id = "singnupBtn" name ="btn_singup">Sign up</button>
                    <button type="button" id = "singninBtn" class="disable">Sign in</button>
                </div>
            </form>
        </div>
    </div>

 <script>
    let singnupBtn = document.getElementById("singnupBtn");
    let singninBtn = document.getElementById("singninBtn");
    let nameField = document.getElementById("nameField");
    let title = document.getElementById("title");
    let my = document.getElementById("btn_my");
      
    singninBtn.onclick= function(){
        nameField.style.maxHeight = "0";
        title.innerHTML = "Sign In";
        singnupBtn.classList.add("disable"); 
        singninBtn.classList.remove("disable");
    }

    singnupBtn.onclick = function(){
        nameField.style.maxHeight = "60px";
        title.innerHTML = "Sign Up";
        singninBtn.classList.add("disable");
        singnupBtn.classList.remove("disable");
    }
    
  </script>    
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
</body>
</html>



<?php while($record = mysqli_fetch_assoc($fetched_students_obj)) { ?>
                        <tr>
                            <td><?php echo $record['id']; ?></td>
                            <td>
                                <img src="uploads/<?php echo $record['image']; ?>" height="120px" width="120px" alt="OK">
                            </td>
                            <td><?php echo $record['name']; ?></td>
                            <td><?php echo $record['age']; ?></td>
                            <td><?php echo $record['course']; ?></td>
                            <td>
                                <a href="index.php?edit_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-warning">EDIT</button>
                                </a>
                            </td>
                            <td>
                                <a href="index.php?delete_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-danger">DELETE</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>