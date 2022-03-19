<?php
session_start();

require_once "connection.php";
$connection = getConnection();

if($_SESSION['login'] == FALSE){
    $_SESSION['pesan'] = "Anda harus melakukan login!";
    header('Location:login.php');
    exit();
}
$iduser = $_SESSION['id'];
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
                                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
            </nav>

            <div class="container-fluid">
                <div class="batasisi">
                    <div class="row judul-login">
                        <h1>To Do List</h1>
                    </div>
                     
               
            
            <form method="POST" action="proses.php?action=inputtodo">
                    <div class="row" style="margin:15px 10px 5px 0px">
                        <div class="col-4" style="text-align:center">
                            <a>Title</a>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                        </div>
                    </div>

                    <div class="row"style="margin:20px 10px 5px 0px">
                        <div class="col-4"style="text-align:center">
                            <a>Description</a>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="isi" placeholder="Deskripsi" required></textarea>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col-5" style="text-align:right">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                        <div class="col-5">
                            <button type="reset" class="btn btn-outline-primary" style="margin-left:10px">Reset</button>
                        </div>
                    </div>
            </form>
                
            </div>
            </div>
        </div>
        <br>
           <?php if(isset($_GET['input']))
                        {
                            if($_GET['input']=='success')
                            {
                                echo '<div class="alert alert-info" role="alert" style="text-align:center">';
                                echo "Add To Do Success";
                                echo '</div>';
                            }else if($_GET['input']=='failed'){
                                echo '<div class="alert alert-danger" role="alert" style="text-align:center">';
                                echo "Add To Do Failed";  
                                echo '</div>';
                            }
                        }
            ?>
    
</div>
</body>
</html>