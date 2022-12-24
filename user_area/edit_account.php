<?php
if(isset($_GET['edit_account']))
{
    $user_session_name=$_SESSION['username'];
    $select_query="Select * from `user_table` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $userrname=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
    

}
if(isset($_POST['user_update']))
{
    $update_id=$user_id;
    $userrname=$_POST['user_username'];
    $userr_email=$_POST['user_email'];
    $userr_address=$_POST['user_address'];
    $userr_mobile=$_POST['user_mobile'];
    $userr_image=$_FILES['user_image']['name'];             
    $userr_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($userr_image_tmp,"./user_images/$userr_image");

    //update query
    $update_query="Update `user_table` set username='$userrname',user_email='$userr_email',user_image='$userr_image',
    user_address='$userr_address',user_mobile='$userr_mobile' where user_id='$update_id'";
    $result_query_update=mysqli_query($con,$update_query);
    if($result_query_update)

    {
        echo "<script>alert('Data updated successfully')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" class="text-center" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $userrname  ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto"  name="user_email" value="<?php echo $user_email ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-50 m-auto" name="user_image">
            
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address  ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile  ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update"class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
    
    
</body>
</html>