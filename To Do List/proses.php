<?php
session_start();
include("library.php");
$action = $_GET['action'];
$library = new Library();

if ($action == "register"){//untuk register
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $jeniskelamin = $_POST["jk"];
    try{
        $check = $library->checkUsername($username);//melakukan pengecekan apakah username sudah ada atau belum
        if($check == NULL){
            $library->Register($username, $nama, $password, $jeniskelamin);
            header('Location:register.php?register=success');
        }else{
            echo "
			<script>
				alert('Username has already exist');
				document.location.href = 'register.php';
			</script>
		    ";
        }
    }catch(Exception $e){
        $str= filter_var($e->getMessage(), FILTER_SANITIZE_STRING);          
        header('Location:register.php?register=failed');
    }
}
if ($action == "masuk"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $success = false;
    $user = $library->Login($username, $password);
    if($user != NULL){
        $success = true;
        $_SESSION["login"] = true;
        $_SESSION['name'] = $user['name'];
        $_SESSION['id'] = $user['id'];
        $_SESSION["pesan"]  = "Berhasil Login";
        header('Location:home.php');
    }
    if($success){
       //sukses
    }else{
        header("location:login.php?pesan=gagal");
        //$pesan = "Username atau Password salah!";
    }
}

if($action == "logout"){
    session_destroy();
    header("Location:login.php?pesan=logout");
}

if ($action == "inputtodo"){
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];
    $iduser = $_SESSION['id'];
    try{
        $library->InputToDo($judul, $isi, $iduser);
        header('Location:input.php?input=success');
    }catch(Exception $e){
        $str= filter_var($e->getMessage(), FILTER_SANITIZE_STRING);      
        header('Location:input.php?input=failed');
    }
}

if($action == "edit"){
    $idtodo = $_POST['idtodo'];
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];

    try{
        $library->EditToDo($judul,$isi,$idtodo);
        $_SESSION['edit'] = "success";
        header("Location:edit.php?id=$idtodo");

    }catch(Exception $e){
        $str= filter_var($e->getMessage(), FILTER_SANITIZE_STRING);  
        $_SESSION['edit'] = "failed";    
        header("Location:edit.php?id=$idtodo");
    }
}

if($action == "deletetodo"){
    $idtodo = $_GET['id'];
    try{
        $library->DeleteToDo($idtodo);
        $_SESSION['delete'] = "success";
        header("Location:home.php");

    }catch(Exception $e){
        $str= filter_var($e->getMessage(), FILTER_SANITIZE_STRING);      
        header("Location:edit.php?id=$idtodo");
        $_SESSION['delete'] = "failed";    
    }
}

