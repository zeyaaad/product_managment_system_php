<?php include('navbar.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

if(!isset($_SESSION['userdetalis'])) {
    header('location:index.php');
}


$user_data=$_SESSION['userdetalis'];
?>
    <div class="container">
        <div class="datashow w-75 w-sm-100  p-5 mx-auto mt-5 contdata">
            <h4 class='alert alert-success' > Your Name: <?php echo $user_data["name"] ?>  </h4>
            <h4 class='alert alert-success' > Your Email: <?php echo $user_data["email"] ?>  </h4>
            <h4 class='alert alert-success' > Your Phone: <?php echo $user_data["phone"] ?>  </h4>
            <h4 class='alert alert-success' > Your Role: <?php  if($user_data["is_admin"]==true){echo "Admin";} else {echo "User";} ?>  </h4>


            <a href="changepass.php" class="btn btn-primary mt-4"> Change Password </a>
            <a href="changedata.php" class="btn btn-primary mt-4 mx-2"> Change Data </a>
        </div>
    </div>







</body>
</html>