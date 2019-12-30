<?php
        include('./trackPages.php');
        visitedPages("User Login");
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
          <h2> User Sign In</h2><br><br>
            <label> Enter Your Username</label> &nbsp;&nbsp;
            <input type="text" name="userName"><br><br>
            <label> Enter Your Password</label>&nbsp;&nbsp;
            <input id="pwd" type="password" name="password">
            <br><br><br>
            <input  id="sub_btn" type="submit" name ="submit" value="Login">
        </div>
      </div>
    </section>
<?php 
    ob_start();
    error_reporting(-1);
     $user_Name = trim($_POST["userName"]);
     $password = $_POST["password"];
     if(isset($_POST["submit"])){
         
       if($user_Name != "" && $password != "")
       {
        
        $userFile = fopen("users.txt","r");
          while(!feof($userFile)){
              
              $userData = fgets($userFile);
              $userData = chop($userData);
              
              $userDataSplit = explode(',', $userData);
                if(($userDataSplit[0] == $user_Name) && ($userDataSplit[1] == $password)){
                   
                    echo "<script>window.location='./contact.php'</script>";
                   
                }
              
           
          }

            echo "<section class = 'container' id= 'gallery'> <div class= 'row text-center' >&nbsp;&nbsp;&nbsp;<h3 class='iArt'>Invalid UserName and/or Password.Access Denied! </h3></div></section>";
                   
          fclose($userFile);
        }

      else{
          echo "<section class = 'container' id= 'gallery'> <div class= 'row text-center' >&nbsp;&nbsp;&nbsp;<h3 class='iArt'> The fields cannot be empty. Please enter the user name and password to continue. </h3></div>
    </section>";
      }
    } 
  ob_flush();
  $cookie_name = "productlist";
  setcookie($cookie_name, "", time() - 3600);
    ?>
          
          
    <footer class="container">
      <div class="row">
      <p class="col-sm-4">@MuggleMarket.com</p>
        
      </div>
    </footer>
  </body>
</html>