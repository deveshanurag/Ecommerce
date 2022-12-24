<?php
include('../includes/connection.php');
if(isset($_GET['edit_cate']))
{
    $edit_category_id=$_GET['edit_cate'];
    $select_cate="select * from `categories` where categories_id=$edit_category_id";
    $result_cate=mysqli_query($con,$select_cate);
    $data_cate=mysqli_fetch_array($result_cate);
    $cate_title=$data_cate['categories_title'];

}
if(isset($_POST['edit_category']))
{
    $cate_title=$_POST['category_title'];

    //update

    $update_cate="update `categories` set categories_title='$cate_title' where categories_id='$edit_category_id'"  ;

    $result_update=mysqli_query($con,$update_cate);
    if($result_update)
    {
        echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window_open('index.php','_self')</script>";
    }

}    
?>
<div class="container mt-5">
    <h1 class="text-center">Edit categories</h1>
    <form action="" method="post" >
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" id="category_title" name="category_title" class="form-control" required="required" value="<?php echo $cate_title  ?>">
        </div>
        <div class="text-center">
            <input type="submit" value="Update Category" name="edit_category" class=" btn btn-info px-3 mb-5">
        </div>
</form>