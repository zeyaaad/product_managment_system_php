<?php 


if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if(!isset($_SESSION['userdetalis'])) {
    header('location:index.php')   ;
    die();
    
} 


if($_SERVER['REQUEST_METHOD'] == "POST") {


    function filter_dataa($value){
        $data=trim($value);
        $data=htmlspecialchars($data);
        $data=htmlentities($data);
        return $data;
    }



    $name=filter_var(filter_dataa($_POST["name"]), FILTER_SANITIZE_STRING);
    $category=filter_dataa($_POST["category"]);
    $minprice=filter_var(filter_dataa($_POST["minprice"]), FILTER_SANITIZE_NUMBER_INT);
    $maxprice=filter_var(filter_dataa($_POST["maxprice"]), FILTER_SANITIZE_NUMBER_INT);
    

    
    if(empty($minprice)){
        $minprice=1;
    }

    if(empty($maxprice)){
        $maxprice=99999999999;
    }


    
    

    
    
    



        $conn=mysqli_connect("localhost","root","","testdb");
        if($category=="all" && empty($name)){
            $strim=$conn->prepare(" select * from products 
                        where product_price between ? and ? ;
            ");
            $strim->bind_param("ii", $minprice, $maxprice);
        } else if(empty($name) && $category!="all"){
            $strim=$conn->prepare(" select * from products 
                        where product_price BETWEEN ? and ?
                        and product_cat =?; 
            ");
            $strim->bind_param("iis", $minprice, $maxprice, $category);
        } else if(strlen($name) > 0 && $category!="all"){
            $strim=$conn->prepare(" select * from products 
                        where product_price BETWEEN ? and ?
                        and product_cat = ?
                        and product_name LIKE ? ; 
            ");
             $name = $name . "%"; 
            $strim->bind_param("iiss", $minprice, $maxprice, $category,$name);
        } else if($category=="all" && strlen($name) > 0 ) {
            $strim=$conn->prepare(" select * from products 
                        where product_price BETWEEN ? and ?
                        and product_name LIKE ? ; 
            ");
             $name = $name . "%"; 
            $strim->bind_param("iis", $minprice, $maxprice,$name);
        }
        
        $strim->execute();
        $result = $strim->get_result(); 

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $strim->close();
        $_SESSION["data"]= $data;
        header("location:search.php");
 




} else {
    echo "not Supported Method";
}
