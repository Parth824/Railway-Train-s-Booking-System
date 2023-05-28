<?php


    include('Config/config.php');

    $config = new Config();
    $all_classs = $config->all_get_class();
    $all_general = $config->all_get_general();
    $all_Train = $config->all_get_Train();
    $all_data = $config->all_select_recode();
    if(isset($_REQUEST['btn_add']))
    {
        $name = $_REQUEST['name'];
        $datatime = $_REQUEST['Date'];
        $to_city = $_REQUEST['To'];
        $from_city = $_REQUEST['From'];
        $class_id =$_REQUEST['Class'];
        $g_id = $_REQUEST['General'];
        $t_id = $_REQUEST['Train_Type'];

        $res = $config->Insert_Data($name,$datatime,$to_city,$from_city,$class_id,$g_id,$t_id);

        if($res)
        {
            echo "Succfully..";
        }
        else
        {
            echo "NoT Mech";
        }
    }
    if(isset($_REQUEST['btn_delete']))
    { 
        $id = $_REQUEST['id'];

        $res = $config->delete_booking($id);

        if($res)
        {
            echo "DELETE...";
        }
        else
        {
            echo "Not...";
        }
    }
?>

<html>
    <head>
        <title>Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>
    <body>
    
        <div class="container mt-5">
            <div class="col col-4">
                <form action="index.php" method="GET" enctype="multipart/form-data">
                    Name: <input class="form-control" name="name" type="text"/> <br />
                    Class: <select class= "form-select" name="Class">
                    <?php
                        while($res = mysqli_fetch_assoc($all_classs))
                        {
                    ?>
                    <option class= "form-select" value=<?php echo $res['id'];?>><?php echo $res['class'] ?></option>
                    <?php }?>
                    </select><br/>
                    General: <select class= "form-select" name="General">
                    <?php
                        while($res = mysqli_fetch_assoc($all_general))
                        {
                    ?>
                    <option class= "form-select" value=<?php echo $res['id'];?>><?php echo $res['name'] ?></option>
                    <?php }?>
                    </select><br/>
                    Train_Type: <select class= "form-select" name="Train_Type">
                    <?php
                        while($res = mysqli_fetch_assoc($all_Train))
                        {
                    ?>
                    <option class= "form-select" value=<?php echo $res['id'];?>><?php echo $res['name'] ?></option>
                    <?php }?>
                    </select><br/>
                        From: <input class="form-control" name="From" type="text"/> <br/>
                        To: <input class="form-control" name="To" type="text"/> <br />
                         Date: <input class="form-control" name="Date" type="date"/> <br />
                        <button class="btn btn-primary" name= "btn_add">    
                        Booking
                    </button>
                </form> 
            </div>

            <div class="col col-15">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Class Name</th>
                            <th>General Name</th>
                            <th>Train Name</th>
                            <th>Price</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    <?php while($res = mysqli_fetch_assoc($all_data)){?>
                        <tr>
                            <td><?php echo $res['id']?></td>
                            <td><?php echo $res['nameb']?></td>
                            <td><?php echo $res['datetime']?></td>
                            <td><?php echo $res['from_city']?></td>
                            <td><?php echo $res['to_city']?></td>
                            <td><?php echo $res['class']?></td>
                            <td><?php echo $res['name']?></td>
                            <td><?php echo $res['namet']?></td>
                            <td><?php echo $res['totalprice']?></td>
                            <td>
                                <a href="index.php?edit_id=<?php echo $record['id']; ?>">
                                    <button class="btn btn-warning">EDIT</button>
                                </a>
                            </td>
                            <td>
                                <form action="index.php" method="POST">
                                    <input name="id" type="hidden" value=<?php echo $res['id'];?>>
                                    <button class="btn btn-danger" name = "btn_delete">DELETE</button>
                                </form>                             
                            </td>
                        </tr>
                    <?php }?>
                    
                    </tbody>
                </table>
            </div>
        </div>       

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>
</html>