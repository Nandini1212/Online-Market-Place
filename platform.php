<?php
        include('/track_page_visits.php');
        store_visited_pages("COLLECTIONS");
?> 
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
    <header class="container" >
      <div class="row text-right">
        <h1 class="col-sm-8 text-left"><a style="text-decoration:none" href="index.html">Muggle Market</a></h1>
        <nav class="col-sm-4">
          <p> <a href="index.html">HOME</a></p>
          <p> <a href="about.html">ABOUT</a></p>
          <p><a href="product.html">COLLECTIONS</a></p>
          <p><a class="active" href="news.html">NEWS</a></p>
          <p> <a href="login.php">CONTACTS</a></p>
           <p> <a href="user.html">USER</a></p>
        </nav>
      </div>
    </header>
    <?php
include 'list.php';
$cookie_name = "productlist";

if(isset($_COOKIE[$cookie_name])){
          //echo $_COOKIE[$cookie_name];
  $visitedProducts=unserialize($_COOKIE[$cookie_name]);
} else {
  $visitedProducts =  ProductList::getInstance();
}

$visitedProducts = $visitedProducts->pushUnique($visitedProducts,'platform');
setcookie ($cookie_name, serialize($visitedProducts));

?>
    <section class="jumbotron">
      <div class="container">
        <div class = "row text-center">
          <figure class="col-sm-4"><img src ="./images/platformboard.jpg"/>
          <figcaption>platform 93/4 sign board- $35.00</figcaption>
         </figure>
      <p>a  platform 9 3/4 metal sign board for your room  </p>
          <a href="product.html">Back</a>
        </div>
      </div>
       <div>
     <form method="post" action="review.php">
            <label for="rating">Rate the Product</label>
            <input type="number"  id = "rating" name="rating" min="1" max="5" required/><br>
            <input type="hidden" name="product_name" value="platform"/>
            <input type="hidden" name="company" value="muggle"/>
            
            <label for="review">Review the Product</label><br>
            <textarea rows="5" id="review" name="review" required></textarea><br>
            <input type="submit" name="submitbtn" value =" Add Review">
            
        </form>
        </div>
    </section>
    
   
    
    <footer class="container">
      <div class="row">
      <p class="col-sm-4">@MuggleMarket.com</p>
        
      </div>
    </footer>
  </body>
</html>