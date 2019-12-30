<?php 
include('./trackPages.php');
visitedPages("Retail Product");
?>
                        
<?php
$host="localhost";
        $dbuser="mugglem1_Muggle1";
        $dbpwd="muggle@ll$";
        $dbname="mugglem1_muggleusers";
        $conn = new mysqli($host,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error){
            
        die("Connection not established:".$conn->connect_error);

      }
?>
<div align="center">
                <h1 align="center"> TOP RATED PRODUCTS</h1>
        
          
          <?php
          $conn = new mysqli("localhost","mugglem1_Muggle1","muggle@ll$","mugglem1_muggleusers");
		if($conn->connect_error){
        die("Connection not established:".$conn->connect_error);
      
        }
        $sql = "SELECT DISTINCT(prod_name) from product WHERE prod_company = 'retail' and rating = 5";
          
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
    </div>
    <a href="/viewCart.php">Cart</a> &nbsp; &nbsp; &nbsp;
 
          <a href="/products.html">Products</a>
          </div>

    	<h2>Products</h2>
    	      
            <?php
                $sql = "SELECT * FROM `products1`";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $keywords = $row["keywords"];
                echo $keywords;


                foreach (explode(", ",$keywords) as $key){
                    $key=str_replace(" ","_",$key);
                    echo "<li><a href='#' data-filter='.".$key."' >".$key."</a></li>";
                    
                }
                
            ?>

      

            	<?php
                    $sql = "SELECT * FROM `products1`";

                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                        $str="";
                        foreach(explode(", ",$row["keywords"]) as $key){
                            $key = str_replace(" ","_",$key);
                            $str=$str." ".$key;
  
                        }          
                        $prodname=$row["name"];
                        echo "<div class=' Portfolio-box ".$str."'>\n";
                        echo "<a href='viewProducts.php?id=".$row["id"]."'>";
                        echo "<img style='width:30%' src = '".$row["ImgUrl"]."'>\n";
                        echo "</a>";
                        echo "<h3>".$row["name"]."</h3>\n"; 
                        echo "<p>$".$row["price"]."</p>\n";
                        echo  "<a class='btn btn-primary text-uppercase' href='/addCart.php?item=".$row["name"]."' > Add To Cart</a>\n";                               
                    }


                ?>
   