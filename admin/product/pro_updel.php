<html lang="en">
<head>
    <title>
        UPDATE OR DELETE
    </title>
    <style>
    table, th, td {
        border: 1px solid lightslategray;
        padding: 15px;
        }
        p {
        color: white;
        font-family: courier;
        text-align: center;
        text-decoration: underline;
        font-size: 16%;
        }
        a{color: #96b3b0;}
    body {
        background-color: #003366;
        font-family: "Times New Roman", Helvetica, sans-serif;
        font-size: 16em;
        color: 	#CCFF99;
        }
        th{
        color:lightcoral;
    }

    </style>
    

</head>
<body>
        <p><b>UPDATE/DELETE</b></p>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $sql="SELECT*FROM PRODUCTS";
    $result= $conn->query($sql);

    ?> 
    <table style="width:100%">
    <tr>
        <th>P_ID</th>
        <th>PRODUCT</th>
        <th>CATEGORY ID</th>
        <th>COMPANY</th>
        <th>PRICE</th>
        <th>PRODUCT AVAILABLE</th>
        <th>PRODUCT DETAILS</th>
        <th>PRODUCT IMAGE</th>
        
        
        <th style="color:lightcyan;">UPDATE</th>
        <th style="color:lightcyan;">DELETE</th>
    </tr>

    <?php
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
        $id1= $row["P_ID"];
            ?>
        
        <tr>
        <td> <?php echo $row["P_ID"];  ?></td>
        <td> <?php echo $row["P_NAME"];  ?></td>
        <td> <?php echo $row["C_ID"];  ?></td>
        <td> <?php echo $row["P_COMPANY"];  ?></td>
        <td> <?php echo $row["P_PRICE"];  ?></td>
        <td> <?php echo $row["P_AVAILABLE"];  ?></td>
        <td> <?php echo $row["P_DETAILS"];  ?></td>
        <td> <?php echo $row["P_IMAGE"];  ?></td>
       
        <td> <a href="pro_update.php?id2=<?php echo $id1; ?>" > UPDATE</a></td>
        <td> <a href="pro_delete.php?id1=<?php echo $id1; ?>" onclick="return confirm('Permanently delete the record?You cannot undo this.')">DELETE</a></td>
        
        
    </tr>
    <?php
    
            
        }
    } else {
        echo "0 result";
    }
    echo"</table>";
    $conn->close();
    
?>

</table>

<center>
<button onclick="window.location.href= 'http://localhost/shop_mgmt/admin/product/pro_add.php'" style="margin:15px; padding:12px">add product</button>
</center>
<center><button onclick="window.location.href='http://localhost/shop_mgmt/admin/admin.php'" style="padding: 10px; margin:10px">ADMIN</button></center>

<script>
            var el_up = document.getElementById("GFG_UP");
              
            el_up.innerHTML = 
                "Click on the LINK for further confirmation."; 
        </script> 

</body>  
</html>    
