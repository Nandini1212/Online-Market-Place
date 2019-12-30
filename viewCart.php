<html>
  <head>
    <title>MuggleMarket: An online Diagon Alley store</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css"/>
    <style>
        tbody tr:nth-child(odd) {
          background-color: #fcdcdc;
        }

        tbody tr:nth-child(even) {
          background-color: #f57676;
        }
        
        .center {
          margin: auto;
          width: 15%;
        }
    </style>
  </head>
  <body>
    <header class="container" id="top">
      <div class="row text-right">
        <h1 class="col-sm-8 text-left"><a style="text-decoration:none" href="home.html">Muggle Market</a></h1>
        <nav class="col-sm-4">
          <p> <a  href="home.html">HOME</a></p>
          <p> <a href="about.html">ABOUT</a></p>
          <p><a href="products.html">PRODUCTS</a></p>
          <p><a href="news.html">NEWS</a></p>
          <p> <a href="contact.php">CONTACTS</a></p>
          <p> <a  href="user.html">USER</a></p>
          <p> <a  href="logout.php">LOGOUT</a></p>
          <p> <a  class="active" href="viewCart.php">CART</a></p>
        </nav>
      </div>
    </header>
    
    <?php 
        session_start();
        
        echo "<div class='center'>";
        echo "<table style='aligh:center'> <caption><b>Cart</b></caption> <tr> <th>Item</th><th>Quantity</th></tr>";
        
        foreach($_SESSION['mugglecart'] as $item=>$quant) { 
           echo "<tr><td>" . $item . "</td> <td> " . $quant . "</td>";  
           echo "<td> <b><a href='addCart.php?action=add&item=".$item."'>+</a></b></td>";
           echo "<td><b><a href='addCart.php?action=remove&item=".$item."'>-</a></b></td></tr>"; 
         } 
         
         echo "</table>";
         echo "</center></div>";

          ?>
    
    <footer class="container">
      <div class="row">
      <p class="col-sm-4">@MuggleMarket.com</p>
        
      </div>
    </footer>
  </body>
</html>
          