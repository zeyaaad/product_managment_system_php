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





?>




<div class="container">


    <form action="handeladdproduct.php" method="post" class="w-75 w-sm-100  mx-auto p-4 mt-4 contdata"  >
        <h2>Add product :</h2>

            <?php 
                if(isset($_SESSION["done"])) {
                    echo "<h3 class='alert alert-success' >  Product Add Successfully </h3> ";
                }
            ?>
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
        <button type="submit" class="btn btn-primary mt-3"   > Add Product</button>


    </form>



</div>



   <?php unset($_SESSION["errors"]); 
                unset( $_SESSION["done"]);
        ?>




</body>
</html>