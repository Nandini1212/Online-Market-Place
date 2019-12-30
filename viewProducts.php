<?php 
include('./trackPages.php');
visitedPages("View products");
?>
          

<?$host="localhost";
        $dbuser="mugglem1_Muggle1";
        $dbpwd="muggle@ll$";
        $dbname="mugglem1_muggleusers";
        $conn = new mysqli($host,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error){
            
        die("Connection not established:".$conn->connect_error);

      }?>
<?php
    parse_str($_SERVER['QUERY_STRING']);
    $result = $conn->query("SELECT * FROM `products1`where id = ".$id.";");
    $productId = $id;
    $prod = $result -> fetch_assoc();
    $prod_name= $prod["name"];
    echo $prod_name;
    $hits = $prod["hits"] + 1;
    $conn->query("UPDATE products1 SET hits = ".$hits." WHERE id = ".$id.";");    
    $conn->close();
?>
<?php
    if(isset($_COOKIE["lastids"])){
        if(explode(",",$_COOKIE["lastids"])[0]!=$prod["id"]){
            setcookie("lastids",$prod["id"].",".$_COOKIE["lastids"],time() + (86400 * 30));    
        }
        
    }
    else{
        setcookie("lastids", $prod["id"], time() + (86400 * 30));
    }
?>

<html>
    <head>
        
        <title><?php echo $prod["name"]?></title>
        <?php ob_start(); ?>

    </head>
    
    <body>
        
      
<section class="main-section alabaster" id="about">
	       <div class="container fullsize">
               <center>
                <h2><?php echo $prod["name"]?></h2>
                <h3><?php echo $prod["description"]?></h3>
                <?php echo "<img style='width:50%' src = '".$prod["ImgUrl"]."'>"; ?>
                   <br/>
                   <br/>
                <h3>$ <?php echo $prod["price"]?></h3>
                <?php 
           
                   ?>
                <h4>Keywords: <?php echo $prod["keywords"]?></h4>
                </center>
            </div>
        </section>
        <div>
     <form method="post" action="/review.php">
            <label for="rating">Rate the Product</label>
            <input type="number"  id = "rating" name="rating" min="1" max="5" required/><br>
            <input type="hidden" name="product_name" value="<?php echo $prod_name?>"/>
            <input type="hidden" name="company" value="retail"/>
            
            <label for="review">Review the Product</label><br>
            <textarea rows="5" id="review" name="review" required></textarea><br>
            <input type="submit" name="submitbtn" value =" Add Review">
            
        </form>
        </div>
    </body>
</html>