<?php

include("../../path.php");
include(ROOT_PATH."/app/controllers/users.php");
adminOnly();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Font Awesome csss link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" />

    <!--The css link-->
    <link rel="stylesheet" href="../../assets/css/header.css" />

    <!--Admin styling-->
    <link rel="stylesheet" href="../../assets/css/admin.css" />

    <!--Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">


    <title>Edit Users</title>
</head>

<body>
   <!--Include the Header-->

   <?php include(ROOT_PATH."/app/includes/adminHeader.php")  ?>

   <!--end of the Header-->


    <!--Admin page-wrapper-->
    <input type="checkbox" id="nav-toggle" />
    <div class="admin-wrapper">

        
        <!--Left sidebar-->
       
        <?php include(ROOT_PATH."/app/includes/adminSidebar.php")   ?>
        <!--//Left sidebar-->    


        <!--Admin content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add User</a>
                <a href="index.php" class="btn btn-big">Manage</a>
            </div>

            <div class="content">

                <h2 class="page-title">Edit User</h2>


                <form  action="edit.php" method=post enctype="multipart/form-data" >

                     <!--Display of errors -->

                    <?php include(ROOT_PATH."/app/helpers/formErrors.php");?>
 
                    <!-- // Display of errors -->

                    <input type="hidden" name="id"  value="<?php echo $id ?>" />

                    <div>
                        <label>Username</label>
                        <input type="text" name="username" class="text-input" value="<?php echo $username; ?>"  />
                    </div>


                    <div>
                        <label>Email</label>
                        <input type="email" name="email" class="text-input" value="<?php echo $email; ?>"/>
                    </div>


                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="text-input" value="<?php echo $password; ?>" />
                    </div>


                    <div>
                        <label>Password Confirmation</label>
                        <input type="password" name="passwordConf" class="text-input" value="<?php echo $passwordConf; ?>" />
                    </div>

                     <div>
                        <label>Image</label>
                        <input name="image" type="file" class="text-input">

                    </div>



                    <div>
                       
                        <label>
                            
                        <?php if(isset($admin)):  ?>
                                <input type="checkbox" name="admin"  checked>
                                Admin
                        <?php else: ?>

                                <input type="checkbox" name="admin" >
                                Admin
                        <?php endif;  ?>
                        </label>


                    </div>

                    <div>
                        <button name="edit-user" class="btn btn-big">Edit User</button>

                    </div>



                </form>


            </div>

        </div>

        <!--Admin content-->


    </div>
    <!--// Admin page-wrapper-->
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>


    <!--Ck editor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <!--Custom Script-->
    <script src="../../assets/js/index.js"></script>



</body>





</html>