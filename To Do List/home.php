<?php
session_start();

include("library.php");
$library = new Library();
if($_SESSION['login'] == FALSE){
    //$_SESSION['pesan'] = "Anda harus melakukan login!";
    header('Location:login.php?pesan=belumlogin');
    exit();
}
   
$date = new DateTime();
$date->setTimezone(new DateTimeZone("Asia/Jakarta"));
$iduser = $_SESSION['id'];
$result = $library->ShowToDo($iduser);
$x=0;
     
?>

<html>
    <head>
        <title>To Do</title>
        <link rel="stylesheet" type="text/css" href="todo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>
<body class="bg">
<div class="batas">
       <div class="borderhome">
            <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #0d81fd;">
                
                    <div class="container-fluid">
                        <a class="navbar-brand" style="font-size:30px;" href="#">To Do List</a>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                                <a class="nav-link active" aria-current="page" href="proses.php?action=logout">Logout</a>
                            </div>
                        </div>
                    </div>
            </nav>

            <div class="container-fluid">
                <div class="batasisi">
                    <div class="row judul-login">
                        <h1>To Do List</h1>
                    </div>
                    <div class="row login">
                        <a><?php  echo "Welcome Back " . $_SESSION['name'];?> </a>
                        
                    </div>
                </div>
            </div>
           
                <a style="Margin-left:20px">  Date : <?php echo $date->format("d-m-Y");?></a>
            <div class='row' style="margin-top:10px;margin-bottom:10px">
                <!---<button class="btn btn-primary col-1" style="margin-left:30px" onclick=""> Tambah</button>--->
                <button class="btn btn-primary col-1" style="margin-left:30px" onclick="location.href='input.php';">Add</button>
               
            </div>
            <div>
                <?php 

                if($result != NULL)
                { ?>
                <table class="table table-hover table-bordered">
                    <thead class=" table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php  
                    while($row = $result->fetch())
                    { ++$x; ?>
                        <tr>
                            <th scope="row"><?= $x?></th>
                            <td><a href="edit.php?id=<?=$row['id'];?>" style="text-decoration: none; color:black;"><?= $row['judul'];?></a></td>
                            <td><?= $row['todo'];?></td>
                        </tr>           

                <?php } ?>
                    </tbody>
                </table>
        <?php  } ?>
                    
        
            </div>
            
    </div>
    <br>
    <?php if(isset($_SESSION['delete']))
                    {
                            if($_SESSION['delete']=="success"){
                                echo '<div class="alert alert-info" role="alert" style="text-align:center">';
                                echo "Delete To Do Success";
                                echo '</div>';
                                unset($_SESSION['delete']);
                            } 
                    }?>
</div>
</body>
</html>


