<?php
//include('../includes/connection.php');


$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}




// getting products

function getproducts()
{
    global $con;
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
    $select_query="select * from `products` order by rand() limit 0,2";
          $result_query=mysqli_query($con,$select_query);
          while($row_data=mysqli_fetch_assoc($result_query))
          {
            $prodect_id=$row_data['product_id'];
            $prodect_title=$row_data['product_title'];
            $prodect_des=$row_data['product_description'];
            
            $prodect_img1=$row_data['product_image1'];
            $prodect_price=$row_data['product_price'];
            $categories_id=$row_data['categories_id'];
            $brands_id=$row_data['brands_id'];
            
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                      <img src='./admin_area/product_images/$prodect_img1' class='card-img-top' alt='$prodect_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$prodect_title</h5>
                        <p class='card-text'>$prodect_des</p>
                        <p class='card-text'> Price:$prodect_price/-</p>
                        <a href='index.php?add_to_cart=$prodect_id'
                         class='btn btn-info'>Add To Card</a>
                        <a href='product_details.php?product_id=$prodect_id' class='btn btn-secondary'>View More</a>
                      </div>
            </div>
            </div>";
            
          }
        }}


}

// getting all products

function get_all_product()
{
    global $con;
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
    $select_query="select * from `products` order by rand()";
          $result_query=mysqli_query($con,$select_query);
          while($row_data=mysqli_fetch_assoc($result_query))
          {
            $prodect_id=$row_data['product_id'];
            $prodect_title=$row_data['product_title'];
            $prodect_des=$row_data['product_description'];
            
            $prodect_img1=$row_data['product_image1'];
            $prodect_price=$row_data['product_price'];
            $categories_id=$row_data['categories_id'];
            $brands_id=$row_data['brands_id'];
            
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                      <img src='./admin_area/product_images/$prodect_img1' class='card-img-top' alt='$prodect_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$prodect_title</h5>
                        <p class='card-text'>$prodect_des</p>
                        <p class='card-text'> Price:$prodect_price/-</p>
                        <a href='index.php?add_to_cart=$prodect_id'
                         class='btn btn-info'>Add To Card</a>
                        <a href='product_details.php?product_id=$prodect_id' class='btn btn-secondary'>View More</a>
                      </div>
            </div>
            </div>";
            
          }
        }}

}

// getting unique categories

function get_unique_categories()
{
    global $con;
    if(isset($_GET['category']))
    {
        $catee_id=$_GET['category'];
        
    $select_query="select * from `products` where categories_id = $catee_id";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query)  ;
  if($num_of_rows==0) 
        
  {
    echo "<h2 class='text-center text-danger'>Out Of Stock</h2>";
  }
          while($row_data=mysqli_fetch_assoc($result_query))
          {
            $prodect_id=$row_data['product_id'];
            $prodect_title=$row_data['product_title'];
            $prodect_des=$row_data['product_description'];
            
            $prodect_img1=$row_data['product_image1'];
            $prodect_price=$row_data['product_price'];
            $categories_id=$row_data['categories_id'];
            $brands_id=$row_data['brands_id'];
            
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                      <img src='./admin_area/product_images/$prodect_img1' class='card-img-top' alt='$prodect_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$prodect_title</h5>
                        <p class='card-text'>$prodect_des</p>
                        <p class='card-text'> Price:$prodect_price/-</p>
                        <a href='index.php?add_to_cart=$prodect_id'
                         class='btn btn-info'>Add To Card</a>
                        <a href='product_details.php?product_id=$prodect_id' class='btn btn-secondary'>View More</a>
                      </div>
            </div>
            </div>";
            
          }
        }}



// getting unique brands

function get_unique_brands()
{
    global $con;
    if(isset($_GET['brand']))
    {
        $brand_id=$_GET['brand'];
        
    $select_query="select * from `products` where brands_id = $brand_id";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query)  ;
  if($num_of_rows==0) 
        
  {
    echo "<h2 class='text-center text-danger'>Out Of Stock</h2>";
  }
          while($row_data=mysqli_fetch_assoc($result_query))
          {
            $prodect_id=$row_data['product_id'];
            $prodect_title=$row_data['product_title'];
            $prodect_des=$row_data['product_description'];
            
            $prodect_img1=$row_data['product_image1'];
            $prodect_price=$row_data['product_price'];
            $categories_id=$row_data['categories_id'];
            $brands_id=$row_data['brands_id'];
            
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                      <img src='./admin_area/product_images/$prodect_img1' class='card-img-top' alt='$prodect_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$prodect_title</h5>
                        <p class='card-text'>$prodect_des</p>
                        <p class='card-text'> Price:$prodect_price/-</p>
                        <a href='index.php?add_to_cart=$prodect_id'
                         class='btn btn-info'>Add To Card</a>
                        <a href='product_details.php?product_id=$prodect_id' class='btn btn-secondary'>View More</a>
                      </div>
            </div>
            </div>";
            
          }
        }}








//display brands
function getbrands()
{
    global $con;
$select_brands= "select * from `brands`";
$result_brands= mysqli_query($con,$select_brands);

while($row_data=mysqli_fetch_assoc($result_brands))
{
  $brand_title=$row_data['brands_title'];
  $brand_id=$row_data['brands_id'];
  echo "<li class='nav-item '>
  <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
</li>";
}
}

//display categories


function getcategories()
{
global $con;
$select_cate= "select * from `categories`";
$result_cate= mysqli_query($con,$select_cate);

while($row_cat_data=mysqli_fetch_assoc($result_cate))
{
$cate_title=$row_cat_data['categories_title'];
$cate_id=$row_cat_data['categories_id'];
echo "<li class='nav-item '>
<a href='index.php?category=$cate_id' class='nav-link text-light'>$cate_title</a>
</li>";
                  
}
}

// search product

function search_product()
{
    global $con;
    if(isset($_GET['search_data_product']))
    {
    $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keywords like '%$search_data_value%' ";
          $result_query=mysqli_query($con,$search_query);
          $search_row=mysqli_num_rows($result_query);
          if($search_row==0)
          {
            echo "<h2 class='text-center text-danger' >No Result</h2>";
          }
          while($row_data=mysqli_fetch_assoc($result_query))
          {
            $prodect_id=$row_data['product_id'];
            $prodect_title=$row_data['product_title'];
            $prodect_des=$row_data['product_description'];
            
            $prodect_img1=$row_data['product_image1'];
            $prodect_price=$row_data['product_price'];
            $categories_id=$row_data['categories_id'];
            $brands_id=$row_data['brands_id'];
            
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                      <img src='./admin_area/product_images/$prodect_img1' class='card-img-top' alt='$prodect_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$prodect_title</h5>
                        <p class='card-text'>$prodect_des</p>
                        <p class='card-text'> Price:$prodect_price/-</p>
                        <a href='index.php?add_to_cart=$prodect_id'
                         class='btn btn-info'>Add To Card</a>
                        <a href='product_details.php?product_id=$prodect_id' class='btn btn-secondary'>View More</a>
                      </div>
            </div>
            </div>";
            
          }
        }
    }


     
// view details

function view_details()
{
    global $con;
    if(isset($_GET['product_id']))
    {
    if(!isset($_GET['category']))
    {
        if(!isset($_GET['brand']))
        {
            $product_id=$_GET['product_id'];
    $select_query="select * from `products` where product_id=$product_id";
          $result_query=mysqli_query($con,$select_query);
          while($row_data=mysqli_fetch_assoc($result_query))
          {
            $prodect_id=$row_data['product_id'];
            $prodect_title=$row_data['product_title'];
            $prodect_des=$row_data['product_description'];
            
            $prodect_img1=$row_data['product_image1'];
            $prodect_img2=$row_data['product_image2'];
            $prodect_img3=$row_data['product_image3'];
            $prodect_price=$row_data['product_price'];
            $categories_id=$row_data['categories_id'];
            $brands_id=$row_data['brands_id'];
            
            echo " <div class='col-md-4 mb-2'>
            <div class='card' >
                      <img src='./admin_area/product_images/$prodect_img1' class='card-img-top' alt='$prodect_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$prodect_title</h5>
                        <p class='card-text'>$prodect_des</p>
                        <p class='card-text'> Price:$prodect_price/-</p>
                        <a href='index.php?add_to_cart=$prodect_id'
                         class='btn btn-info'>Add To Card</a>
                        <a href='index.php' class='btn btn-secondary'>Go Home</a>
                      </div>
            </div>
            </div>
            

            <div class='col-md-8'>
<!-- related card -->
<div class='row'>
    <div class='col-md-12'>
        <h4 class='text-center text-info mb-5'>
            Related Products
        </h4>
        </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$prodect_img3' class='card-img-top' alt='$prodect_title'>
            </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$prodect_img2' class='card-img-top' alt='$prodect_title'>
            </div>
        
    </div>
    </div>";

            
          }
        }}}


}
// get ip address function

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart address

function cart()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from `cart_details`
        where ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_row=mysqli_num_rows($result_query);
        if($num_row>0)
        {
            echo "<script>alert('Alredy present')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else
        {
            $insert_query="insert into `cart_details`(product_id,ip_address,quantity) values
             ($get_product_id,'$ip','0')";
             $result_query=mysqli_query($con,$insert_query);
             echo "<script>alert('inserted successfully')</script>";
             echo "<script>window.open('index.php','_self')</script>";
             
        }


    }

}

// cart number

function cart_item()
{
    if(isset($_GET['add_to_cart']))
    {
    global $con;
        $ip = getIPAddress();
        
        $select_query="select * from `cart_details`
        where ip_address='$ip' ";
        $result_query=mysqli_query($con,$select_query);
        $num_cart_row=mysqli_num_rows($result_query);
    }
        else
        {
            global $con;
            $ip = getIPAddress();
            
            $select_query="select * from `cart_details`
            where ip_address='$ip' ";
            $result_query=mysqli_query($con,$select_query);
            $num_cart_row=mysqli_num_rows($result_query);
             
        }

        echo $num_cart_row;


    }

    function total_price()
    {
        $sum=0;
        
    
    global $con;
    $ip = getIPAddress();
    
        
        
    $select_query="select * from `cart_details`,`products` where cart_details.ip_address='$ip' and products.product_id=cart_details.product_id ";
        $result_query=mysqli_query($con,$select_query);
        while($row_data=mysqli_fetch_assoc($result_query))
        {
            $prodect_price=$row_data['product_price'];
            $sum=$sum+$prodect_price;

        }
        echo $sum;
    }


    // get user order details

    function get_user_order_details()
    {
      global $con;
      $username=$_SESSION['username'];
      $get_details="Select * from `user_table` where username='$username'";
      $result_ord_query=mysqli_query($con,$get_details);
      while($row_query=mysqli_fetch_array($result_ord_query))
      {
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account']))
        {
          if(!isset($_GET['my_orders']))
        {
          if(!isset($_GET['delete_account']))
        {
          $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
          $result_order_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_order_query);
          if($row_count>0)
          {
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'> $row_count </span>pending orders! </h3>";
           echo "<h5 class='text-center text-decoration-none'> <a href='profile.php?my_orders' class='text-dark text-decoration-none'> Order Details</a></h5>";
          }
          else
          {
            
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'> $row_count </span>pending orders! </h3>";
            echo "<h5 class='text-center text-decoration-none'> <a href='index.php' class='text-dark text-decoration-none'> Explore More</a></h5>";
          }

          
        }
        }
        }
      }

    }
        

        
    


?>