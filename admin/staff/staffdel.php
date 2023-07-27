<?php
include("connection.php");
$staff_id1= $_GET["id1"];
$sql1 ="DELETE FROM STAFF_INFO WHERE STAFF_ID=$staff_id1";
if ($conn->query($sql1) === TRUE) {
  $conn->close();
  
  echo
  "
  <script>
    alert(' Staff deleted successfully ');
    document.location.href = 'http://localhost/shop_mgmt/admin/staff/index.php';
  </script>
  ";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
?> 
