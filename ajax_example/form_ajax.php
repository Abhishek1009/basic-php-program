<!DOCTYPE HTML>
<html>
   <head>
   </head>
   <body>
      <script>
         function showHint() {
             if (str.length == 0) {
                 document.getElementById("output").innerHTML = "";
                 return;
             } else {
                 var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function() {
                     if (this.readyState == 4 && this.status == 200) {
                         document.getElementById("outpu").innerHTML = this.responseText;
                     }
                 };
                 var name=document.getElementsByName('name');
                 var email=document.getElementsByName('email');
                 var website=document.getElementsByName('website');
                 var comment=document.getElementsByName('comment');
                 xmlhttp.open('POST', 'form.php',true);
                 xmlhttp.setRequestHeader("Content-Type", "application/json");
                 xmlhttp.send(JSON.stringify({
                     name: name,
                     email: email,
                     website: website,
                     comment: comment
                 }));
             }
         }
      </script>
      <h2>PHP Form Validation Example</h2>
      <form method="post" id="myForm">
         Name:
         <input type="text" name="name">
         <br>
         <br> E-mail:
         <input type="text" name="email">
         <br>
         <br> Website:
         <input type="text" name="website">
         <br>
         <br> Comment:
         <textarea name="comment" rows="5" cols="40">Do Some comment</textarea>
         <br>
         <br>
         <input type="submit" name="submit" value="Submit" onkeyup="showHint()">
      </form>
      <p></p>
      <p></p>
      <p></p>
      <p id="output"></p>
   </body>
</html>
<?php
$str_json = file_get_contents('php://input');
$response= (explode("&",$str_json));
if(count($response)>1)
{
   $name=(explode("=",$response[0]));
   $name=$name[1];
   $email=(explode("=",$response[1]));
   $email=$email[1];
   $email=str_replace("%40","@",$email);
   $website=(explode("=",$response[2]));
   $website=$website[1]; 
   $comment=(explode("=",$response[3]));
   $comment=$comment[1];
   $comment=str_replace("+"," ",$comment);
   $comment=str_replace("%27","'",$comment);
   $comment=str_replace("%0D%0A","",$comment);

}
 if (empty($name)) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($name);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($email)) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($email);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($website)) {
    $websiteErr = "Please provide us a website";
  } else {
    $website = test_input($website);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($comment)) {
    $commentErr = "Do Some comment";
  } else {
    $comment = test_input($comment);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($name)){echo $name."<br>";}
if(isset($nameErr)){echo $nameErr."<br>";}
if(isset($email)){echo $email."<br>";}
if(isset($emailErr)){echo $emailErr."<br>";}
if(isset($website)){echo $website."<br>";}
if(isset($websiteErr)){echo $websiteErr."<br>";}
if(isset($comment)){echo $comment."<br>";}
if(isset($commentErr)){echo $commentErr."<br>";}
?>