<?php include('navbar.php');?>


<?php 
        
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if(!isset($_SESSION['userdetalis'])) {
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


    <form action="handelchangedata.php" method="post" class="w-75  mx-auto p-4 mt-4 contdata" >
        <h2>Change Name & Email :</h2>
                   <?php 
                if(isset($_SESSION["done"])) {
                    echo "<h3 class='alert alert-success' >  Data Changed Successfully </h3> ";
                }
                if(isset($_SESSION["error"])) {
                    echo "<h3 class='alert alert-danger' >  Email Exist  </h3> ";
                }
            ?>

            <label for="name" class="mt-3" >New Name :</label>
            <input  value="<?php if(isset($_SESSION['userback'])){echo $_SESSION['userback']['name']; }else{echo "";} ?>" type="text" name="name" id="name" class="form-control">
            <?php if (isset($errors["name"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["name"]; ?></p>
        <?php } ?>
            <hr>
            <label for="email" class="mt-3" >New Email</label>
            <input value="<?php if(isset($_SESSION['userback'])){echo $_SESSION['userback']['email']; } ?>" type="email" name="email" id="email" class="form-control">
              <?php if (isset($errors["email"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["email"]; ?></p>
        <?php } ?>
            <hr>
            <label for="phone" class="mt-3" >New Phone</label>
            <input value="<?php if(isset($_SESSION['userback'])){echo $_SESSION['userback']['phone']; } ?>" type="number" name="phone" id="phone" class="form-control">
              <?php if (isset($errors["phone"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["phone"]; ?></p>
        <?php } ?>


        <button type="submit" class="btn btn-primary mt-3"> Change</button>


    </form>



</div>



   <?php unset($_SESSION["errors"]); 
                unset( $_SESSION["done"]);
                unset( $_SESSION["error"]);
                unset( $_SESSION["userback"]);
        ?>




</body>
</html>