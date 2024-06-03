<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors=[];
    function filter_dataa($value){
        $data=trim($value);
        $data=htmlspecialchars($data);
        $data=htmlentities($data);
        return $data;
    }

    $name=filter_var(filter_dataa($_POST['name']),FILTER_SANITIZE_STRING);
    $email=filter_var(filter_dataa($_POST['email']),FILTER_SANITIZE_EMAIL);
    $password=filter_dataa(filter_dataa(($_POST['password'])));
    $re_password=filter_dataa(($_POST['re_password']));
    $phone=filter_var(filter_dataa($_POST['phone']),FILTER_SANITIZE_NUMBER_INT);


     if(empty($name)){
        $errors["name"]="name is empty !" ;
    } else if(strlen($name)<3){
        $errors["name"]="name at least contain 3 chars";
    } else if(strlen($name) > 50){
        $errors["name"]="name must be less than 50 chars";
    }

    if(empty($email)){
        $errors["email"]= "Write Your Email";
    } else if(!filter_var($email , FILTER_VALIDATE_EMAIL) ) {
        $errors["email"]= "Invaild Email";
    }
    if(empty($password)){
        $errors["password"]= "Write Your Password !";
    } else if(strlen($password) > 30){
        $errors["password"]= "password must be less than 30 chars";
    } else if(strlen($password) < 4){
        $errors["password"]= "password at least contain 4 chars";
    }
    if(empty($re_password)){
        $errors["re_password"]= "Write Your re_password";
    } else if($password != $re_password){
        $errors["re_password"]= "Re_password not match with the password !";

    }
    if(empty($phone)){
        $errors["phone"]="Write Your phone";
    } else if(strlen($phone) < 5){
        $errors["phone"]= "Phone Number at least contain 5 numbers";
    } else if(strlen($phone) > 30){
        $errors["phone"]= "Phone Number  must be less than 30 number";
    } else if(!ctype_digit($phone)) {
        $errors["phone"]= "Invaild Phone Number !";
    }
    

    session_start();

    if(empty($errors)){
        $conn=mysqli_connect("localhost","root","","testdb"); 
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $countemails = $result->fetch_assoc()['COUNT(*)'];
        if($countemails>0){
        $_SESSION["email_exist"]="email exist";
        $_SESSION["user"]=[
            "name"=>$name ,
            "email"=>$email,
            "password"=>$password ,
            "re_pass"=>$re_password,
            "phone"=> $phone
        ];
            header("location:signup.php");
        } else {
            define("per",false);
            mysqli_query( $conn,"
            insert into users(`name` , `email` , `u_pass` , `phone` ,`is_admin` )
            values('$name' , '$email' , '$password' , '$phone','$per')
            ");
            $_SESSION["Done"]="done add";
            header("location:index.php");
        }
        
    } else {
        $_SESSION["user"]=[
            "name"=>$name ,
            "email"=>$email,
            "password"=>$password ,
            "re_pass"=>$re_password,
            "phone"=> $phone
        ];
        $_SESSION["errors"]=$errors;
        header("location:signup.php");
    }



    $stmt->close();
    $conn->close();
    } else {
        echo '<h1> Not supported Method ya 3beett :) </h1>';
    }



?>