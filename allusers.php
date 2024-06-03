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



$conn=mysqli_connect("localhost","root","","testdb");
$data=$conn->query("select * from users");
$conn->close();
$num=1;
?>




<div class="container">


    <h2 class="text-center " >All Users</h2>


    <table class="table table-dark table-hover mt-4 text-center" >

        <thead>
            <th> # </th>
            <th> Name </th>
            <th> Email </th>
            <th> phone </th>
            <th> Permistion </th>
            <th>Change</th>
            <th>Remove</th>
        </thead>
        <tbody>
            <?php foreach($data as $row): $id=$row["id"]  ?>
                <tr>
                    <?php if($row["email"]==$_SESSION["userdetalis"]['email']){continue;} ?>
                    <td><?php echo $num ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
                    <td><?php 
                    
                        if($row["is_admin"]==true) {
                            echo" Admin ";
                        } else{
                            echo" User ";
                        }

                    ?></td>
                    <td><?php  
                        if($row["is_admin"]==true) {
                            echo"
                            <form action='changeadmin.php' method='post' >
                                <input type='hidden' name='id' value=$id >
                                <input type='hidden' name='per' value='admin' >
                                <button class='btn btn-danger' > Remove From Admin  </button> 
                             </form>
                             ";
                        } else{
                            echo" 
                            <form action='changeadmin.php' method='post' >
                                <input type='hidden' name='id' value= $id  >
                                <input type='hidden' name='per' value='user' >
                                <button class='btn btn-primary' > Assign as Admin  </button> 
                             </form>
                            ";
                        }

                    ?></td>
                    <td>

                    <form action="deluser.php" method="post" >
                        <input type="hidden" name="id" value=<?php echo "$id" ?> >
                        <button class='btn btn-danger' class="submit"   > Remove </button>
                    </form>


                    </td>
                </tr>



            <?php $num++; endforeach; ?>
        </tbody>
    </table>
         


</div>



  



</body>
</html>