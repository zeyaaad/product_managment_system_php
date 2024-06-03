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
    $pre=$_POST['per'];

    $conn=mysqli_connect('localhost','root','','testdb');
    if($pre=="admin") {
        $conn->query(" 
            Update users 
            set is_admin=false
            where id=$id;
        ");
        $conn->close();
        header("location:allusers.php");
        
    } else if($pre== "user"){
        $conn->query(" 
        Update  users 
        set is_admin=true
        where id=$id;
        ");
        $conn->close();
        header("location:allusers.php");

    } else {
        echo"What Are You doing y 3bet ??";
    }



   

    





} else {
    echo "Not Supported Method ya 3bet";
}

