<?php include('navbar.php');    ?>
    


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

     <form action="handellogin.php" method="post" class="w-75 w-sm-100  mx-auto p-4 mt-4 contdata" >
        <h2> Log in     : </h2>

        <?php 

            if(isset($_SESSION['error'])) {
            echo "<h5 class='alert alert-danger' > Wrong Email or Password !  </h5>";
        }
        ?>
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

               <button type="submit" class="btn btn-primary mt-5" > Log in</button>


    </form>




</div>

<?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["done"]);
    unset($_SESSION["email_exist"]);
    unset($_SESSION["user"]);
    unset($_SESSION["error"]);


?>


</body>
</html>