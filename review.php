<?php

if(isset($_POST["submitbtn"])){
      $company = $_POST["company"];
        $prod_name = $_POST["product_name"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];
        echo $company;
        echo $prod_name;
        

      if(!empty($rating) && !empty($review)){
        $host="localhost";
        $dbuser="mugglem1_Muggle1";
        $dbpwd="muggle@ll$";
        $dbname="mugglem1_muggleusers";
        $conn = new mysqli($host,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error){
            
        die("Connection not established:".$conn->connect_error);

      }
      
      $sql="INSERT INTO product (prod_company,prod_name,rating,review) values('$company', '$prod_name', '$rating', '$review')";
      if($conn->query($sql)){
      echo "updated review";
    }
    else{
        echo "Error:" .$conn->error;
      }
}
else{
    echo "Fields cannot be empty";
}
}
?>