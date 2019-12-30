
<?php
        if(isset($_SESSION["logged"]) && isset($_SESSION["user"]) && ($_SESSION["logged"] == 1)){
            
        echo"<script>window.location='./home.html'</script>";
        } 
?>
<html>
  <head>
    <title>MuggleMarket: Login</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <header class="container" id="top">
      <div class="row text-right">
        <h1 class="col-sm-8 text-left"><a style="text-decoration:none" href="index.html">Muggle Market</a></h1>
         </header>
        <section class="jumbotron">
      <div class="container">
        <div class = "row text-center">
            
        <form action="" method ="post">
              <div class="container con" align="center">
    <div class="row" align="center">
      <div class="col-sm-9 col-md-7 col-lg-5" align="center">
        <div class="card card-signin my-5" align="center">
          <div class="card-body" align="center">
            <h5 class="card-title" align="center">Sign In</h5>
            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <input type="text" name="email" id="username" class="form-control" placeholder="User Name" required autofocus>
                <label for="username"></label>
              </div>

              <div class="form-label-group">
                <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required>
                <label for="pwd"></label>
              </div>

             
              <input class="btn btn-lg btn-primary btn-block text-uppercase" id="signin" name= "submit" type="submit" value="Sign In">
            
        
          
       
        
        </div>
      </div>
    </section>
 <?php
 if(isset($_POST["submit"])){
     
        $email = $_POST["email"];
       
        $password = $_POST["pwd"];
       $salt_pwd="23123iikjhwegsftsdfhfhfjajk".$password."asdsfgssa";
           $hash_pwd = hash('sha512',$salt_pwd);
       if(!empty($email) && !empty($password)){
        $host="localhost";
        $dbuser="mugglem1_Muggle1";
        $dbpwd="muggle@ll$";
        $dbname="mugglem1_muggleusers";
        $conn = new mysqli($host,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error){
            
        die("Connection not established:".$conn->connect_error);

      }
      
     $sql="SELECT * FROM users WHERE email = '$email' and password='$hash_pwd'";
        $output= $conn->query($sql);
        $row = $output->fetch_assoc();
          if($output->num_rows > 0 ){
              session_start();
              $_SESSION["logged"]=1;
              $_SESSION["user"]=$email;
              echo $_SESSION["user"];
             echo "<script>alert('Successful Login');</script>";
             echo "<script>window.location='./home.html'</script>";
              }
              else{
                  
                  echo "<script>alert('Incorrect Credentials');</script>";
              }
 
      }
    
    
 }
 //echo "logged". $_SESSION["logged"];
//echo "u". $_SESSION["user"];
//echo "id" . session_id() ;
//echo "con" . isset($_SESSION["logged"]) && isset($_SESSION["user"]) && ($_SESSION["logged"] == 1);
?>
<div><a href="newuser.php">New User? Create Account</a></div>
</section>
 
 </body>
 </html>