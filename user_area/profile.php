<?php
include('../includes/connection.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .profile_img{
    width:100%;
    
    display: block;
    margin:auto;
    object-fit:contain;
}
    </style>
     <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   <!-- navbar -->
   <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="../IMG/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all_product.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php  cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Total Price:<?php total_price(); ?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">


      </form>
    </div>
  </div>
  
  
</nav>

<!-- calling cart function  -->

<?php
cart();
?>
<!-- second child -->

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <ul class="navbar-nav me-auto">

    <?php
          if(!isset($_SESSION['username']))
          {
            echo "<li class='nav-item'>
            <a class='nav-link' href='user_login'>Welcome guest</a>
          </li>";
          }
          else
          {

            echo "<li class='nav-item'>
            <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }
    ?>
    

        <?php
          if(!isset($_SESSION['username']))
          {
            echo "<li class='nav-item'>
            <a class='nav-link' href='user_login.php'>Login</a>
          </li>";
          }
          else
          {

           echo " <li class='nav-item'>
          <a class='nav-link' href='user_logout.php'>Logout</a>
        </li>";
          }
        ?>

        
</ul>
  </nav>

  <!-- third child -->
  <div class="bg-light">
    <h3 class="text-center">
        Hidden Store
    </h3>
    <p class="text-center">
        Communication is then heart of e-commerce and community

    </p>
  </div>



  <!-- fourth child -->

  <div class="row">
    <div class="col-md-2 p-0">
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-info">
    <a href="profile.php" class="nav-link text-light"><h4>Your Profile</h4></a>
</li>
<?php
$username=$_SESSION['username'];
$user_name="Select * from `user_table` where username='$username'";
$result_image=mysqli_query($con,$user_name);
$row_image=mysqli_fetch_array($result_image);
$user_image=$row_image['user_image'];
echo "<li class='nav-item'>
<img src='./user_images/$user_image' alt='' class='profile_img my-4'>
</li>"


?>



<li class="nav-item">
    <a href="profile.php" class="nav-link text-light">Pending orders</a>
</li>
<li class="nav-item">
    <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
</li>
<li class="nav-item">
    <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
</li>
<li class="nav-item">
    <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
</li>
<li class="nav-item">
    <a href="user_logout.php" class="nav-link text-light">Log Out</a>
</li>

        </ul>
    </div>
    <div class="col-md-10">
        <?php
           get_user_order_details();
           if(isset($_GET['edit_account']))
           {
            include('edit_account.php');
           }
           if(isset($_GET['my_orders']))
        
           {
            include('user_orders.php');
           }
           if(isset($_GET['delete_account']))
        
           {
            include('delete_account.php');
           }
        ?>
    </div>
  </div>
  
<!-- last child -->
<!-- include footer -->
<?php
include('../includes/footer.php');
?>

   </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- bootstrap js link -->
</body>
</html>




















