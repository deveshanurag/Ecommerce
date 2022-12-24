<?php
include('../includes/connection.php');
if(isset($_POST['insert_brand']))
{
    $category_title=$_POST['brand_title'];


    //check duplicate
    $select_query="select * from `brands` where brands_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0)
    {
        echo "<script>alert('already present')</script>";
    }
    

else
{
    $insert_query="insert into `brands`(brands_title) values('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result)
    {
        echo "<script>alert('brands inserted successfully')</script>";
    }
}
}
 
?>
<h2 class="text-center">insert brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipet"></i></span>
  
  <input type="text" class="form-control" name="brand_title" placeholder="insert brands" aria-label="brands" aria-describedby="basic-addon1">

    
  
    
    </div>
    <div class="input-group w-10 mb-2 m-auto">

  
  <input type="submit" class="bg-info" name="insert_brand" value="Insert brands" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">

    
  
    
    </div>
</form>