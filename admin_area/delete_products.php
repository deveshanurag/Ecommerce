<?php
include('../includes/connection.php');
if(isset($_GET['delete_products']))
{
    $delete_id=$_GET['delete_products'];
    $delete_query="Delete from `products` where product_id=$delete_id ";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete)
      {
        echo "<script>alert('Delected Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }
}

?>