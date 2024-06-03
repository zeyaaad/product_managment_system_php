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


    <form action="handelchangepass.php" method="post" class="w-75  mx-auto p-4 mt-4 contdata" >
        <h2>Change Password :</h2>
                   <?php 
                if(isset($_SESSION["done"])) {
                    echo "<h3 class='alert alert-success' >  Password Changed Successfully </h3> ";
                }
            ?>

            <label for="cu_pass" class="mt-3" >Current Password</label>
            <input type="password" name="cu_pass" id="cu_pass" class="form-control">
            <?php if (isset($errors["cur_pass"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["cur_pass"]; ?></p>
        <?php } ?>
            <hr>
            <label for="new_pass" class="mt-3" >New Password</label>
            <input type="password" name="new_pass" id="new_pass" class="form-control">
              <?php if (isset($errors["new_pass"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["new_pass"]; ?></p>
        <?php } ?>
            <label for="re_pass" class="mt-3" >reEnter Password</label>
            <input type="password" name="re_pass" id="re_pass" class="form-control">
                  <?php if (isset($errors["re_pass"])) { ?>
            <p class="alert alert-danger p-1 "><?php echo $errors["re_pass"]; ?></p>
        <?php } ?>

        <button type="submit" class="btn btn-primary mt-3"> Change</button>


    </form>



</div>



   <?php unset($_SESSION["errors"]); 
                unset( $_SESSION["done"]);
        ?>




</body>
</html>