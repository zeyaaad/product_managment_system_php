<?php include('navbar.php');?>


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



if(isset($_SESSION["errors"])){
    $errors=$_SESSION["errors"];
} else {
    $errors=[];
}

if(isset($_POST["id"])) {
    $id=$_POST['id'];
} else if(isset($_SESSION["id"])) {
    $id=$_SESSION["id"];
} else {
    $id=Null ;
}


?>




<div class="container">


    <form action="handelupdateproduct.php" method="post" class="w-75  mx-auto p-4 mt-4 contdata" >
        <h2>Update product :</h2>

            <?php 
                if(isset($_SESSION["done"])) {
                    echo "<h3 class='alert alert-success' >  Product Updated Successfully </h3> ";
                }
            ?>
        <input type="hidden" name="id" value=<?php echo $id; ?>>
        <label for="name" class="mt-3" > Name </label>
        <input type="text" name="name" id="name"class="form-control" >
         <?php if (isset($errors["name"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["name"]; ?></p>
        <?php } ?>
        <label for="price" class="mt-3" > Price </label>
        <input type="text" name="price" id="price"class="form-control" >
             <?php if (isset($errors["price"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["price"]; ?></p>
        <?php } ?>
        <label for="category" class="mt-3" > Category </label>
        <select class="form-control" name="category" id="category">
            <option value="electronics">Electronics</option>
            <option value="clothing">Clothing</option>
            <option value="personal_care">Personal Care</option>
            <option value="furniture">Furniture</option>
            <option value="books ">Books </option>      
        </select>
       

        <label for="desc" class="mt-3" > Description</label>
        <textarea class="form-control" name="desc" id="desc" cols="20" rows="5"></textarea>
        <?php if (isset($errors["desc"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["desc"]; ?></p>
        <?php } ?>
        <button type="submit" class="btn btn-primary mt-3"   > Update</button>


    </form>



</div>



   <?php unset($_SESSION["errors"]); 
                unset( $_SESSION["done"]);
                unset( $_SESSION["id"]);
        ?>




</body>
</html>