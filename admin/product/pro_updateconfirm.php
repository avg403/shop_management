
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    $id3=$_POST["id3"];
    $product = $_POST["pname3"];
    $pcate = $_POST["category3"];
    $com = $_POST["pcompany3"];
    $price = $_POST["pprice3"];
    $available = $_POST["pavailable3"];
    $details = $_POST["productdetails3"];
    $pimage=$_POST["image3"];



    

$sql = "UPDATE `products` SET `P_NAME`='$product',`C_ID`='$pcate',`P_COMPANY`='$com',`P_PRICE`='$price',`P_AVAILABLE`='$available',`P_DETAILS`='$details',`P_IMAGE`='$pimage' WHERE P_ID=$id3
";




if ($conn->query($sql) === TRUE) {
  echo
  "<script>
  alert(' item updated successfully ');
  document.location.href = 'http://localhost/shop_mgmt/admin/product/pro_updel.php';
</script>
";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 