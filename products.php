<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if(!isset($_SESSION['userdetalis'])) {
 header('location:index.php')   ;
    die();
}   





include('navbar.php') ?>
    
<?php 



    $conn=mysqli_connect("localhost" , "root" , "" ,"testdb") ;
    define("sql","select * from products;");
    $data=mysqli_query($conn,sql) ;
    $conn->close();



?>


<h1 class="text-center mb-5" > All Products : </h1>

<div class="container">
    <table class="table table-hover table-dark text-center table-striped table-bordered" >
        <thead class="text-denger" >
            <th class="text-denger"> #  </th>
            <th class="text-denger"> Name  </th>
            <th class="text-denger"> Price  </th>
            <th class="text-denger"> Category  </th>
            <th class="text-denger">   Desc  </th>
            <?php if($_SESSION['userdetalis']['is_admin']==true)  {
                echo "<th> Update 
                    
                </th > 
                    <th> Delete </th>
                ";
            } ?>
        </thead>
        <tbody>

        <?php 
            $num=1;
        foreach($data as $row){
        ?>
        <tr>
            <?php $product_id=$row['id'] ?>
            <td> <?php echo $num ?> </td>
            <td> <?php echo $row["product_name"] ?> </td>
            <td> <?php echo $row["product_price"] ?> </td>
            <td> <?php echo $row["product_cat"] ?> </td>
            <td> <?php if(strlen($row["product_desc"])) { echo $row["product_desc"];} else {echo " No Desc " ;}  ?> </td>
             <?php if($_SESSION['userdetalis']['is_admin']==true)  {
                echo "
                
                    <td> 
                        <form  method='post' action='updateproduct.php' >
                        <input type='hidden' name='id' value='$product_id' >
                        <button type='submit' class='btn btn-primary' > Update </button>
                    </form>
                    </td>
                     <td> 
                    <form  method='post' action='delproduct.php' >
                        <input type='hidden' name='id' value='$product_id' >
                        <button type='submit' class='btn btn-danger' > Delete   </button>
                    </form>
                </td >
                ";
            } ?>
        </tr>

        
    <?php $num++; }; ?>
        </tbody>
    </table>

</div>   
    
</body>
</html>