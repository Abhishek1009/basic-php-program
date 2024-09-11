<?php
include("db.php");

function clean($string)
{
    return htmlentities($string);
}
function redirect($location)
{
    return header("location: {$location}");
}
//redirect('db.php');
function set_message($message)
{
    if(!$message)
    {
        $_SESSION['message']=$message;
    }
    else
    {
        $message="";
    }
}
function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    
}
function token_generator()
{
    $token=$_SESSION['token']= md5(uniqid(mt_rand(),true));
    return $token;
}

function validate_user()//call it where form is submitted
{
    $errors=[];
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $name=clean($_POST['name']);
        $email=clean($_POST['email']);
        $password=clean($_POST['password']);
        if($name<5 ||$name>20)
        {
            $error="name should be in between 5 to 20";
        }
        if(email_exists($email))
        {
           $error="Email id already exists";  
        }
        if(!empty($error))
        {
            //use bootstrap alert for showing the error
            //echo in delimiter
            foreach($errors as $error)
            {
                echo $error;
            }
        }
        else
        {
            if(register_user($name,$email,$password))
            {
                $message="please check your email to check the activatin code";
                set_message($message);
                //call the display_message function where the form will be submitted
                redirect("index.php");
            }
        }
        
    }
}
function email_exists($email)
{
    $sql="select * from users where email = ".$email;
    $result=query($sql);
    if(row_count($result)==1)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}

function register_user($name,$email,$password)
{
    $name=escape($name);
    $email=escape($email);
    $password=escape($password);
    $password=md5($password);
    $validation_code=md5($name+microtime());
    $active=0;
    //sql query to insert
    
    $subject="Activate account";
    $msg="please click on the activation link http://localhost/sample/emailVerify/active.php?email={$email}&code={$validation_code}";
    $header="from: noreply@mywebsite.com";
    send_mail($email,$subject,$msg,$header);
    if($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function send_mail($email,$subject,$msg,$header)
{
   //use php mailer to mail 
}
function activate_user()//call it from activate.php
{
    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        if(isset($_GET['email']))
        {
            $email=$_GET['email'];
            $email=escape($email);
            $code=$$_GET['code'];
            $code=escape($code);
            //sql qury to get active coloumn 
            if(row_count($result)==1);
            //from the email and code update the the active 0 to 1 if already 1 then already activated
            //update the user table
            set_message("your account is activated");
            redirect('login.php');
        }
        //else we are sending another mssg 
        
    }
}
function login_user()
{
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $email=clean($_POST['email']);
        $email=escape($email);
        
        $password=clean($_POST['password']);
        $password=escape($password);   
        $remember=isset($_POST['remember']);
        
        if(isset($_POST['login']))
        {
            //clean then check email password then match then check active or not then login
            $_SESSION['email']=$email;//set the session variable
            //if pasword mathes then set the cookie
            if($remember=="on")
            {
                setcookie('email',$email,time()+60*60*24);
            }
            redirect("index.php");
        }
    }
    
}
function logged_in()//call it from inex
{
    if(isset($_SESSION['email']) || isset($_COOKIE['email']))
    {return true;}
    else
    {return false;}
}
function logout()
{
    if(isset($_SESSION['email']))
    {
        session_destroy();
    }
    if(isset($_COOKIE['email']))
    {
        unset($_COOKIE['email']);
        setcookie( "email", "", time()- 60);
    }
    redirect('login.php');
}

function recover_password()//call it from recover.php
{
    if($_SERVER["REQUEST__METHOD"]=="POST")//there is a hidden input element in the recover.php
    {
        if(isset($_SESSION['token'])&& $POST['token']==$_SESSION['token'])
        {
            $email=clean(escape($_POST['email']));
            if(email_exists($email))
            {
                $validation_code=md5($email,microtime());
                setcookie("temp_access_code",$validation_code,time()+60);
                //mail this validation code and mail to the gmail
            }
            else
            {
                
            }
        }
    }
}



?>
