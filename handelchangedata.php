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
    $new_name=filter_var(filter_dataa($_POST['name']),FILTER_SANITIZE_STRING);
    $new_email=filter_var(filter_dataa($_POST['email']),FILTER_SANITIZE_EMAIL);
    $new_phone=filter_var(filter_dataa($_POST['phone']),FILTER_SANITIZE_NUMBER_INT);

    $current_email=$datauser['email'];

    if(empty($new_name)){
        $errors["name"]="name is empty !" ;
    } else if(strlen($new_name)<3){
        $errors["name"]="name at least contain 3 chars";
    } else if(strlen($new_name) > 50){
        $errors["name"]="name must be less than 50 chars";
    }

    if(empty($new_email)){
        $errors["email"]= "Write Your Email";
    } else if(!filter_var($new_email , FILTER_VALIDATE_EMAIL) ) {
        $errors["email"]= "Invaild Email";
    }
    if(empty($new_phone)){
        $errors["phone"]="Write Your phone";
    } else if(strlen($new_phone) < 5){
        $errors["phone"]= "Phone Number at least contain 5 numbers";
    } else if(strlen($new_phone) > 30){
        $errors["phone"]= "Phone Number  must be less than 30 number";
    } else if(!ctype_digit($new_phone)) {
        $errors["phone"]= "Invaild Phone Number !";
    }
    

    
    
    

    if(empty($errors)) {
        $conn=mysqli_connect("localhost","root","","testdb"); 
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bind_param("s", $new_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $countemails = $result->fetch_assoc()['COUNT(*)'];

        if($countemails>0){
            $_SESSION["error"]="Email Exist";
            header("location:changedata.php");
            die();
        } else {
            $conn=mysqli_connect("localhost","root","" , "testdb");
            $stmt=$conn->prepare("update users SET name=? , email=? , phone=? WHERE email =?  ");
            $stmt->bind_param("ssis",$new_name ,$new_email,$new_phone ,$current_email);
            if($stmt->execute()) {
                echo "done changed successfully!";
            } else {
                echo "Error updating password: " . $stmt->error;
            }
            $stmt->close();
            $conn->close();
            $_SESSION["userdetalis"]["email"]=$new_email; 
            $_SESSION["userdetalis"]["name"]=$new_name; 
            $_SESSION["userdetalis"]["phone"]=$new_phone; 
            $_SESSION["done"]="done";
            header("location:changedata.php");
            die();

        }

        
    } else {
        $_SESSION["errors"]=$errors;
        $_SESSION["userback"]=[
            "name"=>$new_name,
            "email"=>$new_email,
            "phone"=>$new_phone
        ];
        header("location:changedata.php");
        die();

    }





} else {
    echo "not Supported Method";
}
