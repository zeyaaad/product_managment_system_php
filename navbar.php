<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-PG9Pcve0gf8kX/dlFiW9dYirWZ5/j9e6KTmLePdNp90sBFRVJ6AQruIWhpIKBfca+3HZffCMaVicJYwQ5XsUGw==" crossorigin="anonymous" />
    <link href="../css/css.css" rel="stylesheet">
</head>
<body class="bg-dark text-white" >

<div class="container-fluid">
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <img class="logo" width="70" height="70" src="logo-removebg-preview.png"/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php 
                  if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    } 
                    if(isset($_SESSION['userdetalis'])){
                        echo ' 
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Products</a>
                        </li>
                       
                        ';
                        if(isset($_SESSION['userdetalis'])&&$_SESSION['userdetalis']['is_admin']==true){
                            echo '
                        <li class="nav-item">
                            <a class="nav-link" href="addproduct.php">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allusers.php">All Users</a>
                        </li>
                            
                        ';
                        }
                        echo'
                        <li class="nav-item">
                            <a class="nav-link" href="search.php">Search Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>'
                        ;
                    }
                ?>
            </ul>
            
            <?php 
                if(isset($_SESSION['userdetalis'])){
                    echo '
                    <form class="form-inline ml-auto btnlogout" action="logout.php" method="post"> 
                        <input class="btn btn-outline-light" type="submit" value="Log Out">
                    </form>
                    ';
                } else {
                         echo '
                        
                            <div>
                                <a class="btn btn-outline-light" href="index.php">Log in</a>
                                <a class="btn btn-outline-light" href="signup.php">Sign up</a>
                            </div>
                        
                        ';
                }
            ?>
        </div>
    </nav>
</div>


<Script src="../js/bootstrap.bundle.js" ></Script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>