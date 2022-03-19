<?php

class Library
{
    public function __construct()
    {
        $this->con = new PDO("mysql:host=localhost;dbname=todo","root", "");
    }

    public function __destruct()
    {
        $this->con = NULL;
    }
    
    public function Register($username, $nama, $password, $jeniskelamin)
    {
        $sql = "INSERT INTO user(id,username,password,name,jenis_kelamin) VALUES (null,:username,:password,:nama,:jeniskelamin)";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":username",$username);
        $statement->bindParam(":password",$password);
        $statement->bindParam(":nama",$nama);
        $statement->bindParam(":jeniskelamin",$jeniskelamin);
        $statement->execute();
    
    }

    public function Login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":username",$username);
        $statement->bindParam(":password",$password);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function InputToDo($judul,$isi,$iduser)
    {
        $sql = "INSERT INTO todolist(id,judul,todo, id_user) VALUES (null,:judul,:isi,:iduser)";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":judul",$judul);
        $statement->bindParam(":isi",$isi);
        $statement->bindParam(":iduser",$iduser);
        $statement->execute();
    }

    public function EditToDo($judul, $isi, $idtodo)
    {
        $sql = 'UPDATE todolist SET judul = :judul , todo = :isi WHERE id = :idtodo';
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":judul",$judul);
        $statement->bindParam(":isi",$isi);
        $statement->bindParam(":idtodo",$idtodo);
        $statement->execute();
    }

    public function DeleteToDo($id)
    {
        $sql = 'DELETE FROM todolist WHERE id = :idtodo';
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":idtodo",$id);
        $statement->execute();    
    }

    public function ShowToDo($iduser)
    {
        $sql = "SELECT todolist.judul, todolist.todo, todolist.id FROM todolist JOIN user ON todolist.id_user = user.id WHERE user.id = '$iduser' GROUP BY todolist.id";
        $result = $this->con->query($sql);
        return $result;
    }

    public function ShowperToDo($idtodo)
    {
        $sql = 'SELECT *FROM todolist WHERE id = :idtodo';
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":idtodo",$idtodo);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function countData($iduser)
    {
        $sql = "SELECT todolist.judul, todolist.todo, todolist.id FROM todolist JOIN user ON todolist.id_user = user.id WHERE user.id = '$iduser' GROUP BY todolist.id";
        $sql->execute();
        $sql = $this->con->prepare("SELECT FOUND_ROWS()"); 
        $sql->execute();
        $row_count = $sql->fetchColumn();
        return $row_count;
    }

    public function checkUsername($username)
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":username",$username);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
