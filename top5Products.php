<?php
include 'dbConnect.php';
?>
 	<h3>Last 5 viewed</h3>

                <table>
                    <tr>
                        <th>Name</th>
                        <th>Hits</th>
                    </tr>
                <?php
                $sql = "SELECT * FROM `products1` ORDER BY hits DESC";
                $results = $conn->query($sql);
                for($i=0; $i<5; $i++){
                    $row = $results->fetch_assoc();
                    echo "<tr>";
                    echo "<td><a href='viewProducts.php?id=".$row["id"]."'>".$row["name"]."</a></td>";
                    echo "<td>".$row["hits"]."</td>";
                    echo "<td><img style='width:10%' src = '".$row["imgUrl"]."'> </img></td>";
                    echo "</tr>";
                }
                
                ?>
                </table>
    

                <?php
                    if(isset($_COOKIE["lastids"])){
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Hits</th>";
                        echo "<th>Image</th>";
                        echo "</tr>";        
                     $heatmap=array();
                     foreach (explode(",",$_COOKIE["lastids"]) as $id){
                         if(isset($heatmap[$id])){
                             $heatmap[$id] = $heatmap[$id] + 1;
                         }
                         else {
                             $heatmap[$id] = 1;
                         }
                     }
                    for($i=0;$i<5;$i++){
                     $max=0;
                     $maxid=0;
                    foreach ($heatmap as $key => $value){
                         if($value>$max){
                             $max = $value;
                             $maxid = $key;
                         }
                     }
                    $result = $conn->query("SELECT * FROM `products1` where id = ".$maxid.";");
                    $row = $result->fetch_assoc();
                    echo "<tr>";
                    echo "<td><a href='viewProducts.php?id=".$row["id"]."'>".$row["name"]."</a></td>";
                    echo "<td>".$max."</td>";
                    echo "</tr>";
                    unset($heatmap[$maxid]);    
                    }
                     
                    }
                   
                    echo "</table>";
                ?>
                

           
                
                <?php
                    if(isset($_COOKIE["lastids"])){
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Description</th>";
                        echo "</tr>"; 
                        $hits = explode(",",$_COOKIE["lastids"]);
                        $viewed = array();
                        for($i=0; $i<5 and $i<sizeof($hits); $i++){
                            $result = $conn->query( "SELECT * FROM `products1` where id = ".$hits[$i].";");
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td><a href='viewProducts.php?id=".$row["id"]."'>".$row["name"]."</a></td>";
                            echo "<td>".$row["description"]."</td>";
                            echo "</tr>";
                            array_push($viewed,$hits[$i]);
                        }
                        echo "</table>";
                    }
                    
                ?>
                
   
    