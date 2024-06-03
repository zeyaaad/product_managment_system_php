<?php include('navbar.php');?>



<?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 


if(isset($_SESSION['userdetalis'])) {
    header('location:home.php');
}
    if(isset($_SESSION['errors'])){
        $errors=$_SESSION['errors'];
        
    } else {
        $errors=[];
    }     
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        
    } else {
        $user=[];
    }     


    // var_dump( $errors );

?>
    



<div class="container">


    <form action="handelsignup.php" method="post" class="w-75 w-sm-100  mx-auto p-4 mt-4 contdata" >
        <h2> Sign UP : </h2>

        <?php 

            if(isset($_SESSION['email_exist'])) {
            echo "<h5 class='alert alert-danger' > Email Already Exist !  </h5>";
        }
        ?>
        <label for="name" class="mt-3" > Name : </label>
        <input   type="text" name="name" id="name" class="form-control" value="<?php if(isset($user["name"])){echo$user["name"];}?>">
        <?php if (isset($errors["name"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["name"]; ?></p>
        <?php } ?>
        <label for="email" class="mt-3" > Email : </label>
        <input type="email" name="email" id="email" class="form-control" value="<?php if(isset($user["email"])){echo$user["email"];}?>">
<?php if (isset($errors["email"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["email"]; ?></p>
        <?php } ?>
        <label for="password" class="mt-3" > Password : </label>
        <input type="password" name="password" id="password" class="form-control" value="<?php if(isset($user["password"])){echo$user["password"];}?>">
            <?php if (isset($errors["password"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["password"]; ?></p>
        <?php } ?>
        <label for="re_password" class="mt-3" > re_password : </label>
        <input type="password" name="re_password" id="re_password" class="form-control" value="<?php if(isset($user["re_pass"])){echo$user["re_pass"];}?>">
                  <?php if (isset($errors["re_password"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["re_password"]; ?></p>
        <?php } ?>
        <label for="phone" class="mt-3" > Phone : </label>
        <input type="number" name="phone" id="phone" class="form-control"  value="<?php if(isset($user["phone"])){echo$user["phone"];}?>">
                        <?php if (isset($errors["phone"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["phone"]; ?></p>
        <?php } ?>
        <button type="submit" class="btn btn-primary mt-5" value="Register"  > Sign Up</button>
    </form>




</div>




<?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["done"]);
    unset($_SESSION["email_exist"]);
    unset($_SESSION["user"]);


?>




</body>
</html>