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
    <title>Admin Dashboard</title>
    
    
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

    

        

.admin_image{
    height: 100px;
    width: 100px;
}
.button{
    
}
    </style>
</head>
<body>
   <!-- navbar -->
   <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../IMG/apple.jpg" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">

                <?php
          if(!isset($_SESSION['admin_name']))
          {
            echo "<li class='nav-item'>
            <a href='' class='nav-link'>welcome guest</a>
        </li>";
          }
          else
          {

            echo "<li class='nav-item'>
            <a class='nav-link' href=''>Welcome ".$_SESSION['admin_name']."</a>
          </li>";
          }
    ?>



                   
                </ul>
</nav>
        </div>

    </nav>
    <!-- second child -->
    <div class="bg-light mx-5">
        <h3 class="text-center p-0">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="row mx-5">
        <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
            <div>
                <a href=""><img src="../IMG/apple.jpg" alt="" class="admin_image"></a>

                <?php
          if(!isset($_SESSION['admin_name']))
          {
            echo "<p class='text-light text-center mt-2'>Admin Name</p>";
          }
          else
          {

            echo "<p class='text-light text-center mt-2'>".$_SESSION['admin_name']."</p>";
          }
    ?>




               <!-- <p class="text-light text-center mt-2">Admin Name</p> -->
            </div>
            <div class="button text-center p-2 mt-5 mx-5">
                <button><a href="insert_product.php" class="nav-link text-light bg-info my-1 mx-2">Insert product</a>
            </button><button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 mx-2">View Product</a>
        </button><button><a href="index.php?devesh" class="nav-link text-light bg-info my-1 mx-2">insert category</a>
    </button><button><a href="index.php?view_category" class="nav-link text-light bg-info my-1 mx-2">view category</a>
</button><button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1 mx-2">insert brand</a>
</button><button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1 mx-2">View brands</a>
</button><button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 mx-2">all orders</a>
</button><button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1 mx-2">all payments</a>
</button><button><a href="index.php?list_users" class="nav-link text-light bg-info my-1 mx-2">list users</a>
</button><button><a href="admin_logout.php" class="nav-link text-light bg-info my-1 mx-2">log out</a></button>
        </div>
        </div>
    </div>

    


   </div>
   <!-- fourth child -->
   <div class="container my-5">
   <?php
    if(isset($_GET['devesh']))
    {
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brands']))
    {
        include('insert_brands.php');
    }
    if(isset($_GET['view_products']))
    {
        include('view_products.php');
    }
    if(isset($_GET['edit_products']))
    {
        include('edit_products.php');
    }
    if(isset($_GET['delete_products']))
    {
        include('delete_products.php');
    }
    if(isset($_GET['view_category']))
    {
        include('view_category.php');
    }
    if(isset($_GET['view_brand']))
    {
        include('view_brand.php');
    }
    if(isset($_GET['edit_bran']))
    {
        include('edit_brands.php');

    }
    if(isset($_GET['delete_bran']))
    {
        include('delete_brands.php');
    }
    if(isset($_GET['edit_cate']))
    {
        include('edit_categories.php');
    }
    if(isset($_GET['delete_cate']))
    {
        include('delete_categories.php');
    }
    if(isset($_GET['list_orders']))
    {
        include('list_orders.php');
    }
    if(isset($_GET['delete_order']))
    {
        include('delete_order.php');
    }
    if(isset($_GET['list_payment']))
    {
        include('list_payment.php');
    }
    if(isset($_GET['delete_payment']))
    {
        include('delete_payment.php');
    }
    if(isset($_GET['list_users']))
    {
        include('list_users.php');
    }
    if(isset($_GET['delete_users']))
    {
        include('delete_users.php');
    }
    ?>



    </div>
   <!-- <div class="bg-info p-3 text-center footer">
   <p>All rights reserved </p> 
</div> -->
<?php
include('../includes/footer.php')
?>
</div>

    
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>