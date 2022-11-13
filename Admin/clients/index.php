<?php

include("../../path.php");
include(ROOT_PATH."/app/controllers/clients.php");
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


    <title>Manage Testimonials</title>
</head>

<body>
   
   <!--Include the Header-->

   <?php include(ROOT_PATH."/app/includes/adminHeader.php")  ?>

   <!--end of the Header-->

    <!--Admin page-wrapper-->
    <input type="checkbox" id="nav-toggle" />
    <div class="admin-wrapper">

        <!--Left sidebar-->

        
        <!--Left sidebar-->
       
        <?php include(ROOT_PATH."/app/includes/adminSidebar.php")   ?>
        <!--//Left sidebar-->

        <!--//Left sidebar-->

        <!--Admin content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add testimonial</a>
                <a href="index.php" class="btn btn-big">Manage</a>
            </div>

            <div class="content">

                <h2 class="page-title">Client Testimonials</h2>

                 <!--Succes message-->
                      <?php include(ROOT_PATH."/app/includes/messages.php"); ?>
                    <!--// Succes message-->

                <div class="table-responsive">

                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>published</th>
                                
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php foreach($clients as $key =>$client): ?>
                            <tr>
                                <td><?php echo $key+1 ?> </td>
                                <td><?php echo $client['username']?> </td>
                                <td><?php echo $client['secondname']?> </td>

                                
                                <?php if($client['published']): ?>
                                    <td><?php echo 'published' ?><td>

                                    <?php else: ?>

                                    <td><?php echo 'Not published' ?><td>

                                 <?php endif; ?>



                                <td><a href="edit.php?id=<?php echo $client['id'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?delete_id=<?php echo $client['id'] ?>" class="delete">delete</a></td>


                            </tr>
                         <?php endforeach; ?>


                        </tbody>





                    </table>
                </div>

            </div>

        </div>

        <!--Admin content-->


    </div>
    <!--// Admin page-wrapper-->
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>


    <!--Custom Script-->
    <script src="../../BlogWebsite.js"></script>



</body>





</html>