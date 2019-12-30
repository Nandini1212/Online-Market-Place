
<?php
        include('./trackPages.php');
        visitedPages("Registration Form");
?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Registration Form</title>
   <link href='https://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css"/>
 </head>
 <body>
  <section class="jumbotron" >
      <div class="container">
      <div class = "row-text-center col-md-9">
        <h1 align="center">SIGN UP</h1>
         <form action = "" method="post">
            <div class="form-label-group">
          <input type="text" name="firstName" id="firstname" class="form-control" placeholder="FirstName" required autofocus>
                <label for="lastname"></label>
            </div>
            <div class="form-label-group">
                <input type="text" name="lastName" id="lastname" class="form-control" placeholder="LastName" required >
                <label for="lastname"></label>
              </div>
              <div class="form-label-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="email" required>
                <label for="email"></label>
              </div>
              <div class="form-label-group">
                <input type="password" name="pwd" id="password" class="form-control" placeholder="Password" required>
                <label for="password"></label>
              </div>
                <div class="form-label-group">
                <input type="password"   class="form-control" name="reppwd" id="confirmPassword" placeholder="Repeat your password" required/>
                <label for="confirmPassword"  > </label>
            </div>
            <input class="btn btn-lg btn-primary btn-block text-uppercase" id="signup" value="Sign Up" type="submit" name="submit">
            </form>
        </div>
             
            
        
         </form>
        </div>
      </div>
    
 <?php
 if(isset($_POST["submit"])){
      $firstname = $_POST["firstName"];
      echo $firstname;
      $lastname = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        $reppassword = $_POST["reppwd"];
        $flag = 1;
        if(!empty($firstname) && !empty($lastname) &&!empty($email) && !empty($password) && !empty($reppassword)){
            if(!preg_match("/^([a-zA-Z' ]+)$/",$firstname)){ 
            $flag= 0; 
            echo "<div style='padding-left:10em;'><b>Please enter a valid first name!</b><br></div>"; 
            
        }
        /*Validation for last name*/
        if(!preg_match("/^([a-zA-Z' ]+)$/",$lastname)){ 
            $flag= 0; 
            echo "<div style='padding-left:10em;'><b>Please enter a valid last name!</b><br></div>"; 
            
        }
        /*Validation for email*/
        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { 
            $flag= 0; 
            echo "<div style='padding-left:10em;'><b>Please enter valid E-mail!</b><br></div>"; 
        }
        /*Validation for passwords*/
        
        if (strcmp($password, $reppassword) != 0){
            $flag= 0;
            echo "<div style='padding-left:10em;'><b>Your passwords do not match!</b><br></div>";
        }
        if ( $flag == 0 ) {
            echo "<div style='padding-left:10em;'><b>User not created because of incorrect credentials!</b></div>"; 
        }
        else {
           $salt_pwd="23123iikjhwegsftsdfhfhfjajk".$password."asdsfgssa";
           $hash_pwd = hash('sha512',$salt_pwd);
           
        $host="localhost";
        $dbuser="mugglem1_Muggle1";
        $dbpwd="muggle@ll$";
        $dbname="mugglem1_muggleusers";
        $conn = new mysqli($host,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error){
            
        die("Connection not established:".$conn->connect_error);

      }
    
      $sql="INSERT INTO users(first_name, last_name, email, password) values('$firstname', '$lastname', '$email', '$hash_pwd')";
      if($conn->query($sql)){
      echo "new user created";
      echo "<script>window.location='./index.php'</script>";
    }
    else{
        echo "Error:" .$conn->error;
      }
      $conn->close();
      }
    }
    else{
      echo "Fields should not be empty";
    }
   
   
    
 }
?>
<div> <a href="index.php"> Already a member ? Login</a></div>
</section>
 
 </body>
 </html>