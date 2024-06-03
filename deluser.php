<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if(isset($_SESSION['userdetalis'])) {
    if($_SESSION['userdetalis']['is_admin']!=true) {
        header('location:home.php')   ;
        die();
    }
} else {
    header('location:index.php')   ;
    die();
}  
if($_SERVER['REQUEST_METHOD'] == "POST") {


    $id=$_POST['id'];

    $conn=mysqli_connect('localhost','root','','testdb');
    $conn->query(" 
        delete from users 
        where id=$id;
    ");

    header("location:allusers.php");





} else {
    echo "Not Supported Method ya 3bet";
}

