<?php
include('../includes/connection.php');
if(isset($_GET['edit_products']))
{
    $edit_id=$_GET['edit_products'];
    $select_pro="select * from `products` where product_id=$edit_id";
    $result_pro=mysqli_query($con,$select_pro);
    $data_pro=mysqli_fetch_array($result_pro);
    $product_title=$data_pro['product_title'];
    $product_description=$data_pro['product_description'];
    $product_keywords=$data_pro['product_keywords'];
    $product_image1=$data_pro['product_image1'];
    $product_image2=$data_pro['product_image2'];
    $product_image3=$data_pro['product_image3'];
    $product_category_id=$data_pro['categories_id'];
    $product_brand_id=$data_pro['brands_id'];
    $product_price=$data_pro['product_price'];


    $select_category="select * from`categories` where categories_id=$product_category_id ";
    $result_category=mysqli_query($con,$select_category);
    $data_category=mysqli_fetch_array($result_category);
    $category=$data_category['categories_title'];


    $select_brand="select * from`brands` where brands_id=$product_brand_id ";
    $result_brand=mysqli_query($con,$select_brand);
    $data_brand=mysqli_fetch_array($result_brand);
    $brand=$data_brand['brands_title'];
}
if(isset($_POST['edit_product']))
{
    $pro_title=$_POST['product_title'];
    $pro_desc=$_POST['product_desc'];
    $pro_keyword=$_POST['product_keyword'];
    
    $pro_category=$_POST['product_category'];
    $pro_brand=$_POST['product_brand'];
    $pro_i1=$_FILES['product_image1']['name'];
    $pro_i2=$_FILES['product_image2']['name'];
    $pro_i3=$_FILES['product_image3']['name'];
    $pro_price=$_POST['product_price'];
    


    $product1_i1=$_FILES['product_image1']['tmp_name'];
    $product2_i2=$_FILES['product_image2']['tmp_name'];
    $product3_i3=$_FILES['product_image3']['tmp_name'];

    move_uploaded_file($product1_i1,"./product_images/$pro_i1");
    move_uploaded_file($product2_i2,"./product_images/$pro_i2");
    move_uploaded_file($product3_i3,"./product_images/$pro_i3");

    //update

    $update_pro="update `products` set product_title='$pro_title',product_description='$pro_desc',product_keywords='$pro_keyword',
    categories_id=$pro_category,brands_id=$pro_brand,product_image1='$pro_i1',product_image2='$pro_i2',product_image3='$pro_i3',
    product_price='$pro_price' where product_id='$edit_id'"  ;

    $result_update=mysqli_query($con,$update_pro);
    if($result_update)
    {
        echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window_open('index.php','_self')</script>";
    }



}



?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required" value="<?php echo $product_title  ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required" value="<?php echo $product_description  ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" id="product_keyword" name="product_keyword" class="form-control" required="required"  value="<?php echo $product_keywords  ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select">
            <option value="<?php echo $category ?> "><?php echo $category ?></option>
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
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Product Brand</label>
            <select name="product_brand" class="form-select">
            <option value="<?php echo $brand ?>"><?php echo $brand ?></option>
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
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control" required="required" height="50px">
            <img src="product_images/<?php echo $product_image1  ?>" alt="" height="100px" width="100px">
        </div>
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control" required="required" height="50px">
            <img src="product_images/<?php echo $product_image2  ?>" alt="" height="100px" width="100px">
        </div>
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label ">Product Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control " required="required" height="50px">
            <img src="product_images/<?php echo $product_image3  ?>" alt="" height="100px" width="100px">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required" value="<?php echo $product_price  ?>">
        </div>
        <div class="text-center">
            <input type="submit" value="Update Product" name="edit_product" class=" btn btn-info px-3 mb-5">
        </div>
        
        
    </form>
</div>
