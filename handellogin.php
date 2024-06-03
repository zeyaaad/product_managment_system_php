<?php 





    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
    $errors=[];
    function filter_dataa($value){
        $data=trim($value);
        $data=htmlspecialchars($data);
        $data=htmlentities($data);
        return $data;
    }

    $email=filter_var(filter_dataa($_POST['email']),FILTER_SANITIZE_EMAIL);
    $password=filter_dataa(filter_dataa(($_POST['password'])));




    if(empty($email)){
        $errors["email"]= "Write Your Email";
    } else if(!filter_var($email , FILTER_VALIDATE_EMAIL) ) {
        $errors["email"]= "Invaild Email";
    }
    if(empty($password)){
        $errors["password"]= "Write Your Password !";
    } 


    

    session_start();

    if(empty($errors)){
        $conn=mysqli_connect("localhost","root","","testdb"); 
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $countemails = $result->fetch_assoc()['COUNT(*)'];
        if($countemails==0){
            $_SESSION["error"]="error email or pass";
             $_SESSION["user"]=[
                "email"=>$email,
                "password"=>$password ,
        ];
            header("location:index.php");
        } else {
            $stmt=$conn->prepare("SELECT u_pass FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $truepass = $result->fetch_assoc()['u_pass'];

                
            if($truepass==$password){
                $user=$conn->query("
                select name , email , u_pass , phone , is_admin from users
                where email = '$email'
                ");
                $_SESSION["userdetalis"]=$user->fetch_assoc();
                header("location:home.php");
              
            } else {
                $_SESSION["error"]="error email or pass";
                  $_SESSION["user"]=[
                "email"=>$email,
                "password"=>$password ,

        ];
                header("location:index.php");
            }

        }
        
    } else {
        $_SESSION["user"]=[
            "email"=>$email,
            "password"=>$password ,

        ];
        $_SESSION["errors"]=$errors;
        header("location:index.php");
    }



    $stmt->close();
    $conn->close();
    } else {
        echo '<h1> Not supported Method ya 3beett :) </h1>';
    }



?>