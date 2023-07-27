<html>

<head>
    <title>
        DATA ADDED
    </title>
    <link rel="stylesheet" href="style2.css">
</head>

<body style="background-color:#2d5a8e">
  
    <center><h1 style='color:rgb(184, 197, 205); font-size: 40px;'><u><b>NEW EMPLOYEE</b></u></h1></center>
       

    <?php
   include("connection.php");


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql="SELECT MAX(P_ID) FROM PRODUCTS";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array( $result );
    $maxid=$row['MAX(P_ID)'];

    $id=$maxid+1;
    $product = $_POST["pname"];
    $pcate = $_POST["category"];
    $com = $_POST["pcompany"];
    $price = $_POST["pprice"];
    $available = $_POST["pavailable"];
    $details = $_POST["productdetails"];
    $pimage=$_POST["image"];


    $query = $conn->prepare('INSERT INTO PRODUCTS(P_ID,P_NAME,C_ID,P_COMPANY,P_PRICE,P_AVAILABLE,P_DETAILS,P_IMAGE)
        VALUES (?,?,?,?,?,?,?,?);');

    $query->bind_param('isisiiss',$id,$product,$pcate,$com,$price,$available,$details,$pimage);

    $query->execute();
    echo " ";
    mysqli_close($conn);
    ?>
    <center>
    <button onclick="window.location.href='index.php';" class="btn button3"> HOME</button> 
    </center>   

</body>

</html>