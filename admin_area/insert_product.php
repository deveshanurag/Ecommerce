<?php
include('../includes/connection.php');
if(isset($_POST['insert_product']))
{
    $product_t=$_POST['product_title'];
    $product_d=$_POST['product_des'];
    $product_k=$_POST['product_key'];
    $product_c=$_POST['prodect_categories'];
    $product_b=$_POST['prodect_brands'];
    $product_i1=$_FILES['product_image1']['name'];
    $product_i2=$_FILES['product_image2']['name'];
    $product_i3=$_FILES['product_image3']['name'];
    $product_p=$_POST['product_price'];
    $product_s='true';


    $product1_i1=$_FILES['product_image1']['tmp_name'];
    $product2_i2=$_FILES['product_image2']['tmp_name'];
    $product3_i3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition

    if($product_t=='' or $product_d=='' or $product_k=='' or
    $product_c=='' or $product_b=='' or $product_i1=='' or
    $product_i2=='' or $product_i3=='')
    {
        echo "<script>alert('please fill all entry')</script>";
        exit();
    }
    else
    {
        move_uploaded_file($product1_i1,"./product_images/$product_i1");
        move_uploaded_file($product2_i2,"./product_images/$product_i2");
        move_uploaded_file($product3_i3,"./product_images/$product_i3");
    //insert query

      $insert_product="insert into `products` (product_title,product_description,product_keywords,categories_id,brands_id,product_image1,product_image2,product_image3,
      product_price,date,status) values ('$product_t','$product_d','$product_k','$product_c','$product_b','$product_i1','$product_i2','$product_i3',
      '$product_p',NOW(),'$product_s')";

      $result_query=mysqli_query($con,$insert_product);
      if($result_query)
    {
        echo "<script>alert('inserted successfully')</script>";
    }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-light">
     <div class="container mt-3">
        <h1 class="text-center">insert product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">

            </div>
            <!-- description -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_des" class="form-label">Product Description</label>
                <input type="text" name="product_des" id="product_des" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">

            </div>
            <!-- product keyword -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_key" class="form-label">Product keyword</label>
                <input type="text" name="product_key" id="product_key" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">

            </div>
            <!-- categories -->
            <div class="form-outline mb-2 w-50 m-auto">
                <select name="prodect_categories" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php
                  $select_query="select * from `categories`";
                  $result_query=mysqli_query($con,$select_query);
                  while($row_data=mysqli_fetch_assoc($result_query))
                
                  {
                    $cate=$row_data['categories_title'];
                    $id=$row_data['categories_id'];
                    echo "<option value='$id'>$cate</option>";
                  }
                ?>
                   
                </select>

            </div>
            <!-- brands -->
            <div class="form-outline mb-2 w-50 m-auto">
                <select name="prodect_brands" id="" class="form-select">
                <option value="">Select a Brand</option>
                <?php
                  $select_query="select * from `brands`";
                  $result_query=mysqli_query($con,$select_query);
                  while($row_data=mysqli_fetch_assoc($result_query))
                
                  {
                    $brands_title=$row_data['brands_title'];
                    $brands_id=$row_data['brands_id'];
                    echo "<option value='$brands_id'>$brands_title</option>";
                  }
                ?>
                    
                </select>

            </div>
            <!-- image1 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"   required="required">

            </div>
            <!-- image2 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"   required="required">

            </div>
            <!-- image3 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"   required="required">

            </div>
            <!-- price -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_price" class="form-label">product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">

            </div>
            <!-- submit -->
            <div class="form-outline mb-2 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info m-3 px-3" value="Insert">

            </div>




        </form>
     </div>
</body>
</html>