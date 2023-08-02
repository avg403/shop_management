<?php
require 'connection.php';
if (isset($_POST["submit"])) {
  $name = $_POST["pname"];
  if ($_FILES["image"]["error"] == 4) {
    echo
    "<script> alert('Image Does Not Exist'); </script>";
  } else {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    } else if ($fileSize > 1000000) {
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    } else {
      //$newImageName = uniqid();
      $newImageName = $name ;
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);

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
      $pimage=$newImageName;
  
      $query = $conn->prepare('INSERT INTO PRODUCTS(P_ID,P_NAME,C_ID,P_COMPANY,P_PRICE,P_AVAILABLE,P_DETAILS,P_IMAGE)
          VALUES (?,?,?,?,?,?,?,?);');
  
      $query->bind_param('isisiiss',$id,$product,$pcate,$com,$price,$available,$details,$pimage);
  
      $query->execute();
      
      mysqli_close($conn);

      echo
      "
      <script>
        alert(' New Product Successfully Added ');
        document.location.href = 'http://localhost/shop_mgmt/admin/admin.php';
      </script>
      ";
    }
  }
}
?>













<html>
<head>
    <title>
        UPDATING
    </title>
</head>
<style>
    body{
      background-color: black;
    }
    p{
      color: aqua;
      font-weight: 200;
      font-size: 20px;
      text-decoration: solid;
    }
    h1{color: lime;
      font-weight: 1000;
      font-size: 35px;
      text-decoration: solid;
      text-align: center;
    }

    h3{
      color: #a8c995;
      font-weight: 500;
      font-size: 16px;
    }
    h4
    {color: #e2597e;
      font-weight: 5px;
      font-size: 12px;
    text-decoration: wavy;}
  </style>
<link rel="stylesheet" href="style4.css">
<body  >
    <h1><u>UPDATE PRODUCTS</u></h1>
    <br>
    <h3>
    [PRODUCT UPDATED SUCCESSFULLY]<br>
  </h3>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//STORING CURRENT VALUES TO VARIABLE 

$p_id2= $_GET["id2"];

$sql="SELECT*FROM PRODUCTS where P_ID=$p_id2";
$result= $conn->query($sql);

if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $id1 = $row["P_ID"];
            $product1 = $row["P_NAME"];
            $pcate1=$row["C_ID"];
            $com1 = $row["P_COMPANY"];
            $price1 = $row["P_PRICE"];
            $available1 = $row["P_AVAILABLE"];
            $details1 = $row["P_DETAILS"];
            $pimage1= $row["P_IMAGE"];

        }
    } else {
        echo "0 result";
    }
    echo"</table>";
    ?>

    <!--DISPLAYING CURRENT DATA IN FROM-->

    <form action="pro_updateconfirm.php" method="post" autocomplete="off">
      <table>
      <tr>
          <td><p>P_ID: <br><br></p></td>
          <td><input type="text"    name="id3" value=<?php echo $p_id2 ?>  readonly="readonly"> <br><br></td>
        </tr>
        <tr>
          <td ><p>PRODUCT: &emsp;&emsp;&emsp; <br><br> </p></td>       

          <td><input type="text"    name="pname3" value="<?php echo htmlspecialchars($product1) ?>"></input> <br><br></td>
        </tr>
        
        <tr>
          <td><p>CATEGORY : <br><br></p></td> 
          <td><select name="category3" required>
            <option id="$category1"checked="selected"> <?php echo $pcate1 ?></option>
            <option value="1"> CLOTHING & APPAREL</option>
	    <option value="2"> COSMETICS </option>  
            <option value="3"> FOOTWEAR & SHOES</option>
            <option value="4"> ELECTRONIC & GADGETS </option>
            <option value="5"> GAMES & TOYS </option>
            <option value="6"> VETERINARY & PET ITEMS </option>
            <option value="7"> STATIONARY </option>
            <option value="8"> TUPPERWARE </option>
            <option value="9"> SPORTS PRODUCTS </option>
            
          </select><br><br></td>
        </tr>
        <tr>
          <td><p>PRODUCT COMPANY :<br><br></p></td>       
          <td><input type="text"  name="pcompany3" value="<?php echo $com1 ?> "><br><br></td>
        </tr>
        <tr>
          <td><p>PRODUCT PRICE :<br><br></p></td>       
          <td><input type="number"    name="pprice3" value=<?php echo $price1 ?> ><br><br></td>
        </tr>
        <tr>
          <td><p>PRODUCT AVAILABLE:   <br><br></p></td> 
	<td><input type="number"    name="pavailable3" value=<?php echo $available1 ?> ><br><br></td>
        </tr>
       
   
        <tr>
          <td><p>PRODUCT DETAILS :<br><br></p></td>
          <td><input type="text"       name="productdetails3"  value="<?php echo htmlspecialchars($details1) ?>"  required><br><br></td>
        </tr>
        <tr>
          <td><p>PRODUCT IMAGE :<br><br></p></td>     
          <td><input type="file"     name="image3"   value="<?php echo $pimage1 ?>" required> <br><br></td>
        </tr>
              </table>
  
      <center><button type="submit" name="submit" class="button3">SUBMIT</button></center>
    </form>
    
           
            
        

</body>
</html>