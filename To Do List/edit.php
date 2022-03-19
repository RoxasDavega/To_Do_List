<?php
session_start();

include("library.php");
if($_SESSION['login'] == FALSE){
    $_SESSION['pesan'] = "Anda harus melakukan login!";
    header('Location:login.php');
    exit();
}

$library = new Library();
$idtodo = $_GET['id'];
$result = $library->ShowperToDo($idtodo);
$row = $result;

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
                     
            <form method="POST" action="process.php?action=edit">
                    <input type="hidden" name="idtodo" value="<?= $row['id']; ?>">
                    <div class="row" style="margin:15px 10px 5px 0px">
                        <div class="col-4" style="text-align:center">
                            <a>Title</a>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="judul" placeholder="Judul" value="<?= $row['judul']; ?>"required>
                        </div>
                    </div>

                    <div class="row"style="margin:20px 10px 5px 0px">
                        <div class="col-4"style="text-align:center">
                            <a>Description</a>
                        </div>
                        <div class="col">
                            <textarea class="form-control" name="isi" placeholder="Deskripsi" required><?= $row['todo'];?></textarea>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col-5" style="text-align:right"><button type="submit" class="btn btn-outline-primary" >Save</button></div>
                        <div class="col-5"><a class="btn btn-outline-primary" role="button" href="process.php?action=deletetodo&id=<?= $row['id']; ?>" onclick="process.php?action=deletetodo&id=<?= $row['id']; ?>">Delete</a></button></div>
                    </div>
            </form>
                
                    <?php if(isset($_SESSION['edit']))
                            {
                                if($_SESSION['edit']=="success"){
                                    echo '<div class="alert alert-info" role="alert" style="text-align:center">';
                                    echo "Edit To Do Success";
                                    echo '</div>';

                                }else if($_SESSION['edit']=="failed"){
                                    echo '<div class="alert alert-danger" role="alert" style="text-align:center">';
                                    echo "Edit To Do Failed";  
                                    echo '</div>';
                                    
                                }
                                unset($_SESSION['edit']);
                            }

                            if(isset($_SESSION['delete']))
                            {
                                if($_SESSION['delete']=="failed")
                                {
                                    echo '<div class="alert alert-info" role="alert" style="text-align:center">';
                                    echo "Delete To Do Failed";
                                    echo '</div>';
                                    unset($_SESSION['delete']);
                                }
                            }
                    ?>
            </div>
            </div>
    </div>
</div>
</body>
</html>