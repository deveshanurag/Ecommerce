<?php
include('includes/connection.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
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
    <img src="./IMG/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all_product.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php  cart_item(); ?></sup></a>
        </li>
        
        
      </ul>
      
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
            <a class='nav-link' href='user_area/user_login.php'>Welcome guest</a>
          </li>";
          }
          else
          {

            echo "<li class='nav-item'>
            <a class='nav-link' href='user_area/profile.php'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }
    ?>
        <?php
          if(!isset($_SESSION['username']))
          {
            echo "<li class='nav-item'>
            <a class='nav-link' href='user_area/user_login.php'>Login</a>
          </li>";
          }
          else
          {

           echo " <li class='nav-item'>
          <a class='nav-link' href='user_area/user_logout.php'>Logout</a>
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

  <!-- fourth table table-->
  

  <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-boardered text-center">
            
            <tbody>
                  <!-- dynamic data -->
                  <?php
                    global $con;
                    $get_ip_add=getIPAddress();
                    $total_price=0;
                    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0)
                    {
                      echo "<thead>
                      <tr>
                          <th>Product Title</th>
                          <th>Product Image</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Remove</th>
                          <th colspan='2'>Operations</th>
                          
                      </tr>
                  </thead>";

                    

                   



                    while($row=mysqli_fetch_array($result))
                    {
                      $product_id=$row['product_id'];
                      $select_product="Select * from `products` where product_id='$product_id' ";
                      $result_products=mysqli_query($con,$select_product);
                      while($row_product_price=mysqli_fetch_array($result_products))
                      {
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_values=array_sum($product_price);
                        $total_price+=$product_values;
                      
                  ?>





 
                 
                   
                        <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" height="100px" width="100px"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                       $get_ip_add = getIPAddress();  
                      if(isset($_POST['update_cart']))
                 {
                    $quantities=$_POST['qty'];
                    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                    $result_products_quantity=mysqli_query($con,$update_cart);
                    
                    $total_price=$total_price*$quantities;
                 } 
                 ?>
                    
                    <td><?php echo $price_table?>/-</td>
                    <td><input type='checkbox' name="removeitem[]" value="<?php echo $product_id    ?>" ></td>
                    <td>
                        
                        <input type='submit' value='Update Cart' name='update_cart'
                         class='bg-info px-3 py-1 border-0 mx-3 text-light' padding='3px' >
                        <!-- <button class='bg-info px-3 py-1 border-0 mx-3 text-light' padding='3px'>Remove</button> -->
                        <input type='submit' value='Remove Cart' name='remove_cart'
                         class='bg-info px-3 py-1 border-0 mx-3 text-light' padding='3px' >
                    </td>
                </tr>

                


                <?php
                }
              }
              
            }
            else
            {
              echo "<h2 class='text-center text-danger'>Cart Is Empty</h2>";

            }
              ?>
            </tbody>
               
            </table>
                
                
        
        <div class="d-flex mb-3">
        <?php
                    global $con;
                    $get_ip_add=getIPAddress();
                    //$total_price=0;
                    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0)
                    {
                       echo "<h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/- </strong></h4>
                       <input type='submit' value='Continue Shopping' name='continue_shopping'
                         class='bg-info px-3 py-1 border-0 mx-3 text-light' padding='3px' >
                       <button class='bg-secondary px-3 py-1 border-0 text-light'><a href='user_area/checkout.php' class='text-light text-decoration-none'>Check Out</a></button>
                   ";
                    }
                    else
                    { 
                      echo "<input type='submit' value='Continue Shopping' name='continue_shopping'
                      class='bg-info px-3 py-1 border-0 mx-3 text-light' padding='3px' >";
                    }
                    if(isset($_POST['continue_shopping']))
                    {
                      echo "<script>window.open('index.php','_self')</script>";
                    }
                  ?>
            
        </div>
        
    </div>  

  </div>

            }
  </form>

            

  <!-- function to remove item -->

  <?php
function remove_cart_item()
{
  global $con;
  if(isset($_POST['remove_cart']))
  {
    foreach($_POST['removeitem'] as $remove_id)
    {
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id ";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete)
      {
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }

}
echo $remove_item=remove_cart_item();

?>





  

<!-- last child -->
<!-- include footer -->
<?php
include('./includes/footer.php');
?>

   </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!-- bootstrap js link -->
</body>
</html>