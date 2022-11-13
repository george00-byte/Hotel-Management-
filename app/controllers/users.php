<?php 
  
   include(ROOT_PATH.'/app/database/db.php');
   include(ROOT_PATH.'/app/helpers/validateUser.php');
    include(ROOT_PATH."/app/helpers/middleware.php");
  

   $table ='users';

   $users=selectAll($table);

   $errors=array();

   $id="";
   $username ='';
   $email = '';
   $password = '';
   $passwordConf ='';
   $admin="";

   function loginUser($user)
   {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin']= $user['admin'];
        $_SESSION['message']= 'you are now logged in';
        $_SESSION['type']= 'succes';

        if($_SESSION['admin'])
        {
            header('location: '.BASE_URL.'/admin/dashboard.php');
        }

        else 
        {
	            header('location: '.BASE_URL.'/index.php');
        }

        exit();
           

   }




   
   if(isset($_POST['register-btn']))
   {
        
        $errors = validateUser($_POST);
        
        if(count($errors) === 0)
        {
            unset($_POST['passwordConf'],$_POST['register-btn']);    

            $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
     
            $user_id=create($table,$_POST);
            $user=selectOne($table,['id'=>$user_id]);

            
            //log in user
            loginUser($user);
            

        }
        else 
        {
           
	       $username =$_POST['username'];
           $email = $_POST['email'];
           $password = $_POST['password'];
           $passwordConf =$_POST['passwordConf'];

          

        }

        
   }

   if(isset($_POST['login-btn']))
   {    
       $errors = validateLogin($_POST);
       
       if(count($errors) === 0)
       {
            $user = selectOne($table,['email'=>$_POST['email']]);
            $_POST['admin']=0;

            if($user && password_verify($_POST['password'],$user['password']))
            {
                //login and redirect
                 loginUser($user);

            }

            if(!$user)
            {
                 array_push($errors,'User does not exist');
            }

            else 
            {
                array_push($errors,'Wrong credentials');
	
            }

       }
       
    
         $email =$_POST['email'];
         $password=$_POST['password'];
	


    }



    if(isset($_POST['create-admin']))
    {
        
        $errors=validateUser($_POST);
       
        if(!empty($_FILES['image']['name']) && isset($_POST['admin']))
	    {
		    $image_name=time().'_'.$_FILES['image']['name'];
		    $destination=ROOT_PATH."/assets/images/".$image_name;

		    $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);

		    if($result)
		    {
			    $_POST['image']=$image_name;
		    }
		    else 
		    {
			    array_push($errors,"Failed to upload image");
            }

		
	    }
	    else if(empty($_FILES['image']['name']) && isset($_POST['admin']))
	    {
		    array_push($errors,"User image required");
	    }


        if(count($errors)=== 0)
        {
            unset($_POST['passwordConf'],$_POST['create-admin']);
            $_POST['password']=password_hash( $_POST['password'],PASSWORD_DEFAULT);

           

            if(isset($_POST['admin']))
            {
                $_POST['admin']=1;
                $user_id=create($table,$_POST);
                $user= selectOne($table,['id'=>$user_id]);

                $_SESSION['type']="succes";
                $_SESSION['message']="Admin user created succesfully";
                header('location: '.BASE_URL."/admin/users/index.php ");
                exit();
               

            }

            else
            {
                
                $_POST['admin']=0;    
                $user_id=create($table,$_POST);
                $user=selectOne($table,['id'=>$user_id]);
                //log in user
                loginUser($user);
                
            }


        }

        else
        {
	       
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $passwordConf =$_POST['passwordConf'];
            $admin=isset($_POST['admin'])?1:0;

        }


    }



    if(isset($_GET['id']))
    {
        
      $user=selectOne($table,['id'=> $_GET['id']]);

      $id=$user['id'];
      $admin=$user['admin'];
      $username=$user['username'];
      $email= $user['email'];


       
    }



    if(isset($_POST['edit-user']))
    {
        
        $errors=validateUser($_POST);
       
        if(!empty($_FILES['image']['name']) && isset($_POST['admin']))
	    {
		    $image_name=time().'_'.$_FILES['image']['name'];
		    $destination=ROOT_PATH."/assets/images/".$image_name;

		    $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);

		    if($result)
		    {
			    $_POST['image']=$image_name;
		    }
		    else 
		    {
			    array_push($errors,"Failed to upload image");
            }

		
	    }
	    else if(empty($_FILES['image']['name']) && isset($_POST['admin']))
	    {
		    array_push($errors,"User image required");
	    }

        $id=$_POST['id'];


        if(count($errors)===0)
        {
           unset($_POST['edit-user'],$_POST['passwordConf'],$_POST['id']);
           $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);

           $_POST['admin']=isset($_POST['admin'])?1:0;
           $count = update($table,$id,$_POST);

           $_SESSION['type']="succes";
           $_SESSION['message']="User updated succesfully";

           header('location: '.BASE_URL."/Admin/users/index.php");
           exit();

           
        }

        else
        {
            $username=$_POST['username'];
            $admin=isset($_POST['admin'])?1:0;
            $email=$_POST['email'];
            $password=$_POST['password'];
            $passwordConf=$_POST['passwordConf'];

        }

    }


    if(isset($_GET['delete_id']))
    {
        $id = $_GET['delete_id'];

        $count = delete($table,$id);

        $_SESSION['type']="succes";
        $_SESSION['message']="User deleted ";

        header('location:'.BASE_URL."/Admin/users/index.php");
        exit();


    }


   
?>
