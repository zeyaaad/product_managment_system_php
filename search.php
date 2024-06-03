<?php include('navbar.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

if(!isset($_SESSION['userdetalis'])) {
    header('location:index.php');
}

if(isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
}


$user_data=$_SESSION['userdetalis'];
?>

<style>
.bodysearch {
    display: flex;
    justify-content: space-between;
}
.bodysearch .searchcont {
    width: 30%;
}
.bodysearch .searchresults {
    text-align: center;
    width: 67%;
}
.searchtable {
    height:80vh !important;
    overflow-y:auto !important;
}
@media(max-width:770px) {
    .bodysearch {
    flex-direction: column;
}
.bodysearch .searchresults {
    text-align: center;
    width:100%;
}
.bodysearch .searchcont {
    width: 100%;
}
}

</style>
    <div class="container">
        <div class="bodysearch">
            <div class="searchcont " >
                <h1> Search: </h1>
                <hr>
                <form action="handelsearch.php" method="post" >

                    <label class="mt-3" for="name">Name pf Product : </label>
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="category" class="mt-3" > Category </label>
                    <select class="form-control" name="category" id="category">
                        <option value="all">All categories </option>      
                        <option value="electronics">Electronics</option>
                        <option value="clothing">Clothing</option>
                        <option value="personal_care">Personal Care</option>
                        <option value="furniture">Furniture</option>
                        <option value="books ">Books </option>      
                    </select>
                    <label class="mt-3" for="minprice"> Min price </label>
                    <input type="number" name="minprice" id="minprice" class="form-control" >
                    <label class="mt-3" for="maxprice"> Max price </label>
                    <input type="number" name="maxprice" id="maxprice" class="form-control" >

                    <button type="submit" class="btn btn-primary mt-3"   > Search</button>

                </form>
            </div>
            <div class="searchresults">
                <h1> Results : </h1>
                <?php if( isset($_SESSION["data"]) && count($data) >0){ $num=1  ?>
                  <div class="searchtable">
                      <table class="table table-dark table-hover  " >
                   <thead>
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
                       <?php foreach($data as $row): $product_id=$row['id'];  ?>
                        <tr>
                            <td><?php echo $num?></td>
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

                        <?php $num++; endforeach; ?>
                   </tbody>
                </table>
                  </div>
                <?php } else if(isset($_SESSION["data"]) && count($data) <1) { echo"<h1 class='mt-5'> Not Results  </h1>"; }?>
            </div>
          
        </div>
    </div>



  <?php unset($_SESSION["errors"]); 
                unset( $_SESSION["data"]);
        ?>



</body>
</html>