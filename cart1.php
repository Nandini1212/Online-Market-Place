
<?php
        include('./trackPages.php');
        visitedPages("cart");
?>
<?php
	session_start();
	$database_name="mugglem1_muggleusers";
	$host="localhost";
	$admin="mugglem1_Muggle1";
	$pass="muggle@ll$";
	
	$conn = mysqli_connect($host, $admin, $pass, $database_name);
	
	
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    
     if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
	  content="width=device-width, user-scale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>MarketPlace Shopping Cart</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    <style>
            @import url('https://fonts.googleapis.com/css?family=Gupter&display=swap');
    
            *{
		font-family: 'Gupter', serif;	
	     }
	     .product{
		 border: 1px solid #eaeaec;
		 margin: -1 19px 3px -1px;
		 padding: 10px;
		 text-align: center;
		 background-color: #efefef;
	     }
	     table, th, tr{
		text-align: center;
	     }
	     .title2{
		 text-align: center;
		 color: #66afe9
		 background-color: #efefef;
		 padding: 2%;
	     }
	     h2{
		 text-align: center;
		 color: #66afe9
		 background-color: #efefef;
		 padding: 2%;
	     }
	     table th{
		background-color: #efefef
	     }

    </style>

</head>
<body>
<div class="container" style="width: 65%">
        <h2>Marketplace</h2>
        <?php
            $query = "SELECT * FROM product_metadata1 ORDER BY id ASC ";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="d-flex flex-row bd-highlight mb-3">

                        <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                            
                            <div class="product">
                                <img src="<?php echo $row["images"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

		    <div style="clear: both">
	            <h3 class="title2">MarketPlace Shopping Cart Details</h3>
		    <div class="table-responsive">
		     <table class=  "table table-bordered">
			<tr>
			 	<th width="30%">Product Name</th>
				<th width="10%">Quantity</th>
 				<th width="13%">Price Info</th>
				<th width="10%">Price_total</th>
				<th width="17%">Remove Item</th>
			</tr>
			
			<?php
			   if(!empty($_SESSION["cart"])){
				$total=0;
				foreach($_SESSION["cart"] as $key => $value){
				   ?>
			       <tr>
					<td><?php echo $value["item_name"]; ?></td>
					<td><?php echo $value["item_quantity"]; ?></td>
					<td>$ <?php echo $value["product_price"]; ?></td>
					<td>$ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
			        <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
			       </tr>
			   	      <?php
			           $total = $total + ($value["item_quantity"] * $value["product_price"]);
		   	        }
				      ?>
			            <tr>
				   	<td colspan="3" align="right">Total</td>
					<th align="right">$ <?php echo number_format($total, 2); ?></th>
					<td></td>
				    </tr>
			           <?php
			   }
            ?>
             </table>
		    </div>
		  </div>

</body>
</html>