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
    $dbname = "SHOP";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $sql="SELECT*FROM STAFF_INFO";
    $result= $conn->query($sql);

    ?> 
    <table  >
    <tr>
        <th>STAFF_ID</th>
        <th>STAFF_NAME</th>
        <th>STAFF_PASSWORD</th>
        <th>STAFF_AGE</th>
        <th>STAFF_SEX</th>
        <th>STAFF_DOB</th>
        <th>STAFF_ADDRESS</th>
        <th>STAFF_SALARY</th>
        <th>STAFF_PHONE</th>
        <th style="color:lightcyan;">UPDATE</th>
        <th style="color:lightcyan;">DELETE</th>
    </tr>

    <?php
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
        $id1= $row["STAFF_ID"];
            ?>
        
        <tr>
        <td> <?php echo $row["STAFF_ID"];  ?></td>
        <td> <?php echo $row["STAFF_NAME"];  ?></td>
        <td> <?php echo $row["STAFF_PASSWORD"];  ?></td>
        <td> <?php echo $row["STAFF_AGE"];  ?></td>
        <td> <?php echo $row["STAFF_SEX"];  ?></td>
        <td> <?php echo $row["STAFF_DOB"];  ?></td>
        <td> <?php echo $row["STAFF_ADDRESS"];  ?></td>
        <td> <?php echo $row["STAFF_SALARY"];  ?></td>
        <td> <?php echo $row["STAFF_PHONE"];  ?></td>
        <td> <a href="staffupd.php?id2=<?php echo $id1; ?>" > UPDATE</a></td>
        <td> <a href="staffdel.php?id1=<?php echo $id1; ?>" onclick="return confirm('Permanently delete the record?You cannot undo this.')">DELETE</a></td>
        
        
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

<center><button onclick="window.location.href='staffreg.php'" style="padding: 10px; margin:10px">ADD STAFF</button></center>
<center><button onclick="window.location.href='http://localhost/shop_mgmt/admin/admin.php'" style="padding: 10px; margin:10px">ADMIN</button></center>

<script>
            var el_up = document.getElementById("GFG_UP");
              
            el_up.innerHTML = 
                "Click on the LINK for further confirmation."; 
        </script> 
</body>  
</html>    
