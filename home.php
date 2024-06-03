<?php include('navbar.php');


    if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

if(!isset($_SESSION['userdetalis'])) {
    header('location:index.php');
}
$user=$_SESSION['userdetalis'];




?>

<style>
    .homebody{
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .homebody img {
        width: 100%;
        height: 100%;
        margin-bottom: 30px;
        border-radius: 50px;
        box-shadow: 0px 0px 30px -10px red ;
    }
    .homebody .text{
        width: 45%;
        text-align: center;
    }
    .homebody .img{
        width: 45%;
    }
    .homebody .text p {
        line-height: 30px;
        opacity: .8;
    }
    .homebody .text h1 {
        font-family: 'Courier New', Courier, monospace;
    }




    .contadv {
    display: grid;
    grid-template-columns: repeat(auto-fill , minmax(350px , 1fr));
    gap: 2%;
}

.aboutdev .card{
    border:none;
    position:relative;
    border-radius:8px;
    cursor:pointer;
    width: 70%;
    background-color: transparent;
    color: white !important;
}

.aboutdev .card:before{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#E1BEE7;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.aboutdev .card:after{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#8E24AA;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.aboutdev .card:hover::after{
    transform:scaleY(1);
}


.aboutdev .fonts{
    font-size:11px;
}

.aboutdev .social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}

.aboutdev .social-list li{
    padding:10px;
    color:#8E24AA;
    font-size:19px;
}


.aboutdev .buttons button:nth-child(1){
       border:1px solid #8E24AA !important;
       color:#8E24AA;
       height:40px;
}

.aboutdev .buttons button:nth-child(1):hover{
       border:1px solid #8E24AA !important;
       color:#fff;
       height:40px;
       background-color:#8E24AA;
}

.aboutdev .buttons button:nth-child(2){
       border:1px solid #8E24AA !important;
       background-color:#8E24AA;
       color:#fff;
        height:40px;
}
.aboutdev .card .cont {
    display: flex !important;
    justify-content: space-around;
    align-items: center;
}
.aboutdev img {
    border-radius: 20px;
}
.contdev {
    display: flex;
    justify-content: center;
}
.zeyad{
    font-family: 'Courier New', Courier, monospace;
}




.cardd img {

  max-width: 100%;
}
.cardd {
  width: 70% ;
  box-shadow: 0px 0px 15px -6px white;
  border-radius: 15px;
  text-align: center;
}
.cardd .cont {
  display: flex;
  justify-content: space-between;
  align-items: center;

}
.cardd .cont p {
  opacity: .8;
}
.cardd  {
  padding: 10px;
   margin-bottom: 20px;
}
@media(max-width:770px){
  .homebody{
    flex-direction: column;
    justify-content: center;
    width: 100%;
  }
  .homebody .text {
    width: 100%;
  }
  .homebody .text {
    width: 100%;
  }
  .cardd {
    margin-top: 200px;
    width: 100%;
    
  }
  .cardd .cont{

    flex-direction: column;
    justify-content: center;
    width: 100%;
    height: 100%;
  }

}
</style>

<div class="container">

<div class="homebody">
  <div class="text">
    <h1 class="text-center" > Welcome  <?php echo $user['name']  ;?>  </h1>
    <p>Welcome to our state-of-the-art Stock Product Management System, your ultimate solution for efficient inventory management. Whether you're a small business owner, a retail manager, or an e-commerce entrepreneur, our system is designed to meet all your inventory needs. Here's a comprehensive look at what our system offer</p>
</div>
<div class="img">
    <img src="img.jpeg" alt="">
</div>
</div>


    <div class="feat" style="margin-top:100px;"> 
        <h1 class="text-center mb-4" > Features  </h1>    
    <div class="contadv">
    <div class="card">
    <div class="box">
      <div class="content">
        <h2>01</h2>
        <h3>User Authentication</h3>
        <p>Login and Logout: Secure login and logout functionality ensures that only authorized users can access the system. <br>
Registration: New users can easily register with their details, ensuring that everyone using the system has a unique identity.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
        <h2>02</h2>
        <h3> Product Management</h3>
        <p>Add Products: Effortlessly add new products to your inventory with a user-friendly form <br> 
    Update Products: Keep your inventory up-to-date by editing product details as needed. <br> Delete Products: Remove outdated or discontinued products from your inventory with a simple click</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
        <h2>03</h2>
        <h3>User Dashboard</h3>
        <p>Profile Management: Users can view and update their personal information, ensuring their profiles are always accurate.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>04</h2>
        <h3>Product Catalog</h3>
        <p>View Products: Browse through your entire inventory in a well-organized catalog. Utilize pagination for easy navigation through large inventories. <br>
        Search and Filter: Quickly find specific products using search and filter options, sorting by category, price, and other criteria.
    </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>05</h2>
        <h3>Admin Panel</h3>
        <p>A control panel is available for the administrator to view all the accounts on the site, and he can delete the user or convert the user to an administrator and vice versa.
    </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h2>06</h2>
        <h3>Security Measures</h3>
        <p>We prioritize your security with comprehensive data protection measures. Our system uses SSL encryption to ensure all transactions and data exchanges are secure, giving you peace of mind.
    </p>
      </div>
    </div>
  </div>


    </div>


    </div>
    <div class="aboutdev" style="margin-top:100px;" >
        <h1 class="text-center mb-3" > About Developer  </h1>
        <div class="contdev" >
               
            <div class="cardd">

                <div class="cont">
                <div class="img">
                  <img width="800" src="z.jpg">
                </div>
                <div class="text">
                  <h3 class="zeyad" > Zeyad Mohamed </h3>
                  <h6> Full Stack Web Developer </h6>
                  <p>  If you want to inquire about anything related to the web or have a modification,
                  do not hesitate to write to me and I will respond to you as soon as possible. </p>
                  <a target="_blank" href="mailto:zeyad14112006@gmail.com?subject=Subject%20Here&body=Body%20content%20here " class="btn btn-outline-primary" >Send Massage</a>
                </div>

              </div>

            </div>


        </div>



    </div>



</div>






</body>
</html>