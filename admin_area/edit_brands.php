<?php
include('../includes/connection.php');
if(isset($_GET['edit_bran']))
{
    $edit_brand_id=$_GET['edit_bran'];
    $select_bran="select * from `brands` where brands_id=$edit_brand_id";
    $result_bran=mysqli_query($con,$select_bran);
    $data_bran=mysqli_fetch_array($result_bran);
    $bran_title=$data_bran['brands_title'];

}
if(isset($_POST['edit_brand']))
{
    $bran_title=$_POST['brand_title'];

    //update

    $update_bran="update `brands` set brands_title='$bran_title' where brands_id='$edit_brand_id'"  ;

    $result_update=mysqli_query($con,$update_bran);
    if($result_update)
    {
        echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window_open('index.php','_self')</script>";
    }

}    
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="post" >
        <div class="form-outline w-50 m-auto mb-4">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" id="brand_title" name="brand_title" class="form-control" required="required" value="<?php echo $bran_title  ?>">
        </div>
        <div class="text-center">
            <input type="submit" value="Update Brand" name="edit_brand" class=" btn btn-info px-3 mb-5">
        </div>
</form>