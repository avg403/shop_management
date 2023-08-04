
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$p_id1= $_GET["id1"];

$sql1 ="DELETE FROM PRODUCTS WHERE P_ID=$p_id1";

if ($conn->query($sql1) === TRUE) {
  $message="item of id ".$p_id1." deleted"; 
  echo
  "<script>
  alert(' $message ');
  document.location.href = 'http://localhost/shop_mgmt/admin/product/pro_updel.php';
</script>
";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?> 