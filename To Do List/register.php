<?php
include("library.php");
$library = new Library();
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
                                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                                <a class="nav-link disabled" aria-current="page" href="register.php">Register</a>
                            </div>
                        </div>
                    </div>
            </nav>

            <div class="container-fluid">
                <div class="batasisi">
                    <div class="row judul-login">
                        <h1>Register</h1>
                    </div>
                    <div class="row login">
                    <form method="POST" action="proses.php?action=register" >

                        <div class="row" style="margin:15px 10px 5px 0px">
                            <div class="col-5" style="text-align:right">
                                <a>Username</a>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="row"style="margin:20px 10px 5px 0px">
                            <div class="col-5"style="text-align:right">
                                <a>Nama</a>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                            </div>
                        </div>

                        <div class="row"style="margin:20px 10px 5px 0px">
                            <div class="col-5"style="text-align:right">
                                <a>Password</a>
                            </div>
                            <div class="col-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" minlength="8" required>
                            </div>
                        </div>

                        <div class="row"style="margin:15px 10px 5px 0px">
                            <div class="col-5" style="text-align:right">
                                <a>Jenis Kelamin</a>
                            </div>
                            <div class="col" style="text-align:left">
                                <input type="radio" name="jk" value="Laki-laki" required>
                                <label for="html">Laki-laki</label>
                                <input type="radio" name="jk" value="Perempuan" required>
                                <label for="html">Perempuan</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary" style="margin-left:10px">Register</button>
                        </form>
                    <?php
                    
                        
                        if(isset($_GET['register'])) //pesan error
                        {
                            if($_GET['register']=='success')
                            {
                                echo '<div class="alert alert-info" role="alert">';
                                echo "Registered Successfully";
                                echo '</div>';
                            }else if($_GET['register']=='failed'){
                                echo '<div class="alert alert-danger" role="alert">';
                                echo "Username already exist";  
                                echo '</div>';
                            }
                        }
                    ?>
                    
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
