<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sports Management System | Admin Web Portal | ROBATO SYSTEMS</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/index-custom.css">

    </head>

    <body>

    <?php            
        session_start();

        include('../config/config.php');
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $sql ="SELECT * FROM companyauth WHERE username=:username and password=:password";
            $query= $db->prepare($sql);
            $query-> bindParam(':username', $username, PDO::PARAM_STR);
            $query-> bindParam(':password', $password, PDO::PARAM_STR);
            $query-> execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
              $_SESSION['companyusername']=$_POST['username'];
              $companyuser = $_SESSION['companyusername'];
          
              echo "<script type='text/javascript'> document.location = 'select-sport.php'; </script>";
            } else{
              echo "<script>alert('Invalid Details Or Account Not Confirmed');</script>";
            }
        }
    ?>



        <div class="container">
            <div class="row">          

                <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
                     <div class="login-title text-center">
                            <img src="../img/DOIT-logo-png.png" width="400px" height="250px">
                            <h2 style="margin-top: 0px;"><span> <b> SPORTS </b> <strong>MANAGEMENT SYSTEM</strong></span></h2>
                     </div>
                    <div class="login-content">
                        <div class="login-header">
                            <div class="text-center">
                                <h3><strong>DOIT STAY FIT PLATFORM</strong></h3>
                            </div>

                        </div>
                        <div class="login-body">
                            <form method="POST" class="login-form">
                                <div class="form-group">
                                    <div class="pos-r">                                        
                                        <input id="form-username" type="email" name="username" placeholder="Username..." class="form-username form-control" required>
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="pos-r">                                    
                                        <input id="form-password" type="password" name="password" placeholder="Password..." class="form-password form-control" required>
                                        <i class="fa fa-lock"></i>                                        
                                    </div>
                                </div>  
                                <br>
                                <div class="form-group">     
                                    <button type="submit" name="login" class="btn button_login form-control"><strong>Login</strong></button>  
                                </div>   
                                                                              
                            </form>
                        </div> <!-- end  login-body -->                     
                    </div><!-- end  login-content -->  
                </div>  <!-- end  login-container -->      

            </div>
        </div><!-- end container -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>

</html>
