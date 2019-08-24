<?php include "includes/functions.php"; ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<div>
<?php include "includes/navbar.php"; ?>

    
<?php
    $error_array=array();
    session_start();
    $fname='';
    $lname='';
    $email='';
    $stream='';
    $session='';
    $roll='';
    $institution='';
    $password='';
    $cpassword='';
    $username='';
        
    if(isset($_POST['register_signup'])){
        
        $fname=strim($_POST['fname_signup']);
        $lname=strim($_POST['lname_signup']);
        $email=strim($_POST['email_signup']);
        $stream=strim($_POST['stream_signup']);
        $session=trim(strip_tags($_POST['session_signup']));
        $roll=trim(strip_tags($_POST['roll_signup']));
        $institution=trim(strip_tags($_POST['institution_signup']));
        $password=trim(strip_tags($_POST['password_signup']));
        $cpassword=trim(strip_tags($_POST['cpassword_signup']));
        
        
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['email']=$email;
        $_SESSION['stream']=$stream;
        $_SESSION['session']=$session;
        $_SESSION['roll']=$roll;
        $_SESSION['institution']=$institution;
        
        
        if(strlen($fname)<3||strlen($fname)>20)
        {
            array_push($error_array,"your first name should be in between 3 to 20 characters");
        }
        if(strlen($lname)<3||strlen($lname)>20)
        {
            array_push($error_array,"your last name should be in between 3 to 20 characters");
        }
        
        $email_query=query("select email from students where email='$email'");
        if(mysqli_num_rows($email_query)>0){
            array_push($error_array,"email is already in use");
        }
        $roll_query=query("select roll_no from students where roll_no='$roll'");
        if(mysqli_num_rows($roll_query)>0){
            array_push($error_array,"roll no is already in use");
        }
        if($password!=$cpassword)
        {
            array_push($error_array,"password doesn't match");
        }
        if(strlen($password)<8||strlen($password)>20)
        {
            array_push($error_array,"password password should be in between 8 to 20 characters");
        }
        
        if(empty($error_array)){
            $username=strtolower($fname).'_'.strtolower($lname);
            $username_query=query("select username from students where username = '$username'");
            $i=0;
            
            while(mysqli_num_rows($username_query)>0)
            {   
                $i=$i+1;
                $username=strtolower($fname).'_'.strtolower($lname).'_'.$i;
                $username_query=query("select username from students where username = '$username'");
            }
            $password=md5($password);
            $default_profile_picture='assets/profile_pic/default_profile_pic.jpg';
            $default_cover_picture='assets/cover_pic/default_cover_pic.jpg';
            
           
        }
       
        
    
    }
    ?>
<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-login" style="background-color: yellow">
                <div class="panel-heading" style="padding:6px;margin:0px">
                    <div class="row" style="background-color:#fff;padding:0px;margin:0px" >
							<div class="col-xs-6" style="text-align: center;">
                                <a href="login.php" style="font-size: 17px;font-family: Times New Roman, Times, serif;" class="active">Login</a>
							</div>
							<div class="col-xs-6" style="text-align: center;">
								<a href="register.php" style="font-size: 17px;font-family: Times New Roman, Times, serif;">Register</a>
							</div>
						</div>

                </div>
                <div class="panel-body" style="background-color: #874591">
                 <div class="row">
                        <div class="col s12">
                            <form class="col s12" action="register.php" method="post">
                                <div class="row">
                                    
                                    <div class="input-field col s6">
                                        <input id="fname_signup" type="text" class="validate" name="fname_signup" required value=<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];} ?>>
                                        <label for="fname_signup" data-error="wrong" data-success="right">First Name</label>
                                    </div><?php if(in_array("your first name should be in between 3 to 20 characters",$error_array))
                                               {warning("your first name should be in between 3 to 20 characters");} ?>
                                    
                                    <div class="input-field col s6">
                                        <input id="lname_signup" type="text" class="validate" name="lname_signup" required value=<?php if(isset($_SESSION['lname'])){echo $_SESSION['lname'];} ?>>
                                        <label for="lname_signup" data-error="wrong" data-success="right">Last Name</label>
                                    </div><?php if(in_array("your last name should be in between 3 to 20 characters",$error_array))
                                               {warning("your last name should be in between 3 to 20 characters");} ?>
                                    
                                    <div class="input-field col s12">
                                        <input id="email_signup" type="email" class="validate" name="email_signup" required value=<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>>
                                        <label for="email_signup" data-error="wrong" data-success="right">Email address</label>
                                    </div><?php if(in_array("email is already in use",$error_array))
                                               {warning("email is already in use");} ?>
                                    
                                    <div class="input-field col s6">
                                        <input type="text" id="stream_signup" class="validate" name="stream_signup" required value=<?php if(isset($_SESSION['stream'])){echo $_SESSION['stream'];} ?>>
                                        <label for="stream_signup" data-error="wrong" data-success="right">Your stream</label>
                                    </div>
                                    
                                    <div class="input-field col s6">
                                        <input type="text" id="session_signup" class="validate" name="session_signup" placeholder="2015-2019" required value=<?php if(isset($_SESSION['session'])){echo $_SESSION['session'];} ?>>
                                        <label for="session_signup" data-error="wrong" data-success="right">Your session</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <input type="number" id="roll_signup" class="validate" name="roll_signup" required value=<?php if(isset($_SESSION['roll'])){echo $_SESSION['roll'];} ?>>
                                        <label for="roll_signup" data-error="wrong" data-success="right">Your university roll no</label>
                                    </div><?php if(in_array("roll no is already in use",$error_array))
                                               {warning("roll no is already in use");} ?>
                                    
                                    <div class="input-field col s12">
                                        <input type="text" id="institution_signup" class="validate" name="institution_signup" required value=<?php if(isset($_SESSION['institution'])){echo $_SESSION['institution'];} ?>>
                                        <label for="institution_signup" data-error="wrong" data-success="right">Your University or College name</label>
                                    </div>
                                    
                                    <div class="input-field col s6">
                                        <input type="password" id="password_signup" class="validate" name="password_signup" required>
                                        <label for="password_signup" data-error="wrong" data-success="right">Enter your password</label>
                                    </div>
                                    
                                    <div class="input-field col s6">
                                        <input type="password" id="cpassword_signup" class="validate" name="cpassword_signup" required>
                                        <label for="cpassword_signup" data-error="wrong" data-success="right">Confirm your password</label>
                                    </div><?php if(in_array("password doesn't match",$error_array))
                                               {warning("password doesn't match");}
                                                if(in_array("password password should be in between 8 to 20 characters",$error_array))
                                               {warning("password password should be in between 8 to 20 characters");}?>
                                    
											<div class="input-field col s6 offset-s3">
												<input type="submit" name="register_signup" id="register_signup" tabindex="4" class="form-control btn btn-register" value="Register">
											</div>
									
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3"></div>
    </div>   
</div>
    
    
</div>
<?php include "includes/footer.php"; ?>