<!DOCTYPE html>
<html>
  <head>
    <title>MuggleMarket: An online Diagon Alley store</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <header class="container">
      <div class="row text-right">
        <h1 class="col-sm-8 text-left"><a href="index.html">Top Harry Potter Collectibles</a></h1>
        <nav class="col-sm-4">
          <p> <a href="index.html">HOME</a></p>
          <p> <a href="about.html">ABOUT</a></p>
          <p><a  class="active" href="products.html">PRODUCTS</a></p>
          <p><a href="news.html">NEWS</a></p>
          <p> <a href="login.php">CONTACTS</a></p>
          <p> <a href="user.html">USER</a></p>
        </nav>
        </div>
    </header>
 <section class="jumbotron">
    <div class="container">
      <div class = "row-text-center">
          
          <?php
          $conn = new mysqli("localhost","mugglem1_Muggle1","muggle@ll$","mugglem1_muggleusers");
		if($conn->connect_error){
        die("Connection not established:".$conn->connect_error);
      
        }
        $sql = "SELECT DISTINCT(prod_name) from product WHERE prod_company = 'muggle' and rating = 5";
          
            $output = $conn->query($sql);
            
            if($output->num_rows > 0){
                
                echo "<table align='center'>";
                echo "<tr>";
                echo "<td><b>Product Name</b></td>";
                
                echo "</tr>";
                 while($row = $output->fetch_assoc()) {
                     
                     
                    echo "<tr>";
                    echo "<td>". $row["prod_name"] ."</td>";
        		
                 }
                 echo "</table>";
            }
          ?>
          <div align="center">
          <a href="product.html">Go Back</a>
          </div>
          </div>
          </div>
      </section>
       <footer class="container">
      <div class="row">
      <p class="col-sm-4">@MuggleMarket.com</p>
      
        
      </div>
    </footer>
     </body>
</html>