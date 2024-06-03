<?php 


if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if(!isset($_SESSION['userdetalis'])) {
    header('location:index.php')   ;
    die();
    
} 


if($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors=[]; 
    function filter_dataa($value){
        $data=trim($value);
        $data=htmlspecialchars($data);
        $data=htmlentities($data);
        return $data;
    }

    
    $datauser=$_SESSION["userdetalis"] ;
    $cur_pass=filter_dataa($_POST['cu_pass']);
    $new_pass=filter_dataa($_POST['new_pass']);
    $re_pass=filter_dataa($_POST['re_pass']);

    if(empty($cur_pass)) {
        $errors["cur_pass"] = 'Write The Current Password !';
    }elseif($cur_pass !=$datauser['u_pass']){
        $errors["cur_pass"] = ' The Current password is Wrong  ';
    }


     if(empty($new_pass)){
        $errors["new_pass"]= "Write Your Password !";
    } else if(strlen($new_pass) > 30){
        $errors["new_pass"]= "New password must be less than 30 chars";
    } else if(strlen($new_pass) < 4){
        $errors["new_pass"]= "New password at least contain 4 chars";
    }
    if(empty($re_pass)){
        $errors["re_pass"]= "Write Your re_password";
    } else if($re_pass != $new_pass){
        $errors["re_pass"]= "Re_password not match with the password !";

    }
    
    

    if(empty($errors)) {
        $conn=mysqli_connect("localhost","root","" , "testdb");
        $stmt=$conn->prepare("update users SET u_pass=? WHERE email =?  ");
        $stmt->bind_param("ss",$new_pass , $datauser['email']);
         if($stmt->execute()) {
            echo "Password changed successfully!";
        } else {
            echo "Error updating password: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
        $_SESSION["userdetalis"]["u_pass"]=$new_pass; 
        $_SESSION["done"]="done";
        header("location:changepass.php");
    } else {
        $_SESSION["errors"]=$errors;
        header("location:changepass.php");

        print_r($errors);
    }





} else {
    echo "not Supported Method";
}
