
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
    $price=filter_var(filter_dataa(($_POST['price'])) ,FILTER_SANITIZE_NUMBER_INT ); 
    $category=filter_var(filter_dataa(($_POST['category'])) ,FILTER_SANITIZE_STRING );
    $desc=filter_var(filter_dataa(($_POST['desc'])) ,FILTER_SANITIZE_STRING );
    $id=$_POST['id'];


    if(empty($name)){
        $errors["name"]="Write the name !" ;
    } else if(strlen($name)<3){
        $errors["name"]="name at least contain 3 chars";
    } else if(strlen($name) > 50){
        $errors["name"]="name must be less than 50 chars";
    }
    if(empty($price)){
        $errors["price"]="Write the price  !" ;
    }else if(strlen($price) > 30){
        $errors["price"]= "price must be less than 10 numbers";
    } else if(!ctype_digit($price)) {
        $errors["price"]= "Invaild Price!";
    }



    if(!empty($desc)){
        if(strlen($desc)<5) {
        $errors["desc"]= "Desc at least contain 5 chars";
    } 
    }

    session_start();
    if(empty($errors)){

        $conn=mysqli_connect("localhost" , "root" , "" ,"testdb") ;
        $stmt=$conn->prepare(" 
        UPDATE products
        SET product_name = ?, product_price = ?, product_cat = ? , product_desc=?
        WHERE id =?;

        
        ;
        ") ;
        $stmt->bind_param("sissi", $name , $price , $category , $desc,$id) ;
        $stmt->execute();
        $stmt->close();
        $conn->close();
        $_SESSION["done"]="done add";
        header("location:updateproduct.php");

    }else{
        $_SESSION["errors"]=$errors;
        $_SESSION["id"]=$id;
        header("location:updateproduct.php");
    }


    

   

   


    } else {
        echo '<h1> Not supported Method ya 3beett :) </h1>';
    }



?>