<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("37.230.228.84:3306", "u2410_pR3xqSiHjg", "BniW+@JGvvafSoA^4UK1ZSA9", "s2410_onyx");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM economy_items";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>ItemID</th>";
                echo "<th>ItemName</th>";
                echo "<th>Cost</th>";
                echo "<th>BuyBack</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['ItemID'] . "</td>";
                echo "<td>" . $row['ItemName'] . "</td>";
                echo "<td>" . $row['Cost'] . "</td>";
                echo "<td>" . $row['BuyBack'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>