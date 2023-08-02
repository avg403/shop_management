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
        document.location.href = 'http://localhost/shop_mgmt/admin/product/pro_updel.php';
      </script>
      ";
    }
  }
}
?>










<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    REGISTER
  </title>
  <style>
    body {
      background-color: #0d484a;
    }

    p {
      color: #a8c995;
      font-weight: 200;
      font-size: 20px;
      text-decoration: solid;
    }
  </style>
  <link rel="stylesheet" href="style3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


  <center><b>
      <h1 style="color: #a8ff95;">
        PRODUCTS
  </center></b></h1>
  <hr>

  <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <table>

      <tr>
        <td>
          <p>PRODUCT :<br><br></p>
        </td>
        <td><input type="text" name="pname" required><br><br></td>
      </tr>


      <tr>
        <td>
          <p>CATEGORY :<br><br></p>
        </td>
        <td><select name="category">
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
        <td>
          <p>PRODUCT COMPANY :<br><br></p>
        </td>
        <td><input type="text" name="pcompany" required><br><br></td>
      </tr>
      <tr>
        <td>
          <p>PRODUCT PRICE :<br><br></p>
        </td>
        <td><input type="number" name="pprice" required><br><br></td>
      </tr>
      <tr>
        <td>
          <p>PRODUCT AVAILABLE :<br><br></p>
        </td>
        <td><input type="number" name="pavailable" required><br><br></td>
      </tr>
      <tr>
        <td>
          <p>PRODUCT DETAILS:<br><br></p>
        </td>
        <td><input type="text" id="p_details" name="productdetails" maxlength='1000' required><br><br></td>
      </tr>
      <tr>
        <td>
          <p>PRODUCT IMAGE :<br><br></p>
        </td>
        <td> <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
        </td>
      </tr>
    </table>
    <center><button type="submit" name="submit" class="button2">SUBMIT</button></center>
  </form>




  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>