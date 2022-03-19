<?php
session_start();

if(isset($_SESSION["login"]))
{
    header('Location:home.php');
    exit();
}

?>
<html>
    <head>
        <title>Login</title>
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
                                <a class="nav-link disabled" aria-current="page" href="login.php">Login</a>
                                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                            </div>
                        </div>
                    </div>
            </nav>

            <div class="container">
                <div class="batasisi">
                    <div class="row judul-login">
                        <h1>Login</h1>
                    </div>
                    <div class="row login">
                        <form action="proses.php?action=masuk" method="POST">
                            <div class="row" style="margin:15px 10px 5px 0px;">
                                <div class="col-5" style="text-align:right">
                                    <a>Username :</a>
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="row" style="margin:15px 10px 5px 0px;">
                                <div class="col-5" style="text-align:right">
                                    <a>Password :</a>
                                </div>
                                <div class="col-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div style="margin-top:20px">
                                <button type="submit" class="btn btn-outline-primary" style="margin-right:30px;">Login</button>
                                
                            </div>
                        </form>
                        <?php if(isset ($_GET['pesan']))//pesan error
                            {
                            if($_GET['pesan']=='gagal')
                                 {
                                   echo '<div class="alert alert-info" role="alert">';
                                   echo "Username atau Password Salah!";
                                   echo '</div>'; ?>
                            <?php }else if($_GET['pesan']=='logout')
                                 {?>
                                    <a>Anda berhasil logout</a>
                         <?php   }else if($_GET['pesan']=='belumlogin')
                                { ?>
                                    <a><?php echo "Anda harus melakukan login!";?></a>
                          <?php }
                            }
                            ?>
                    
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
