
<?php
include("connection.php");
    $id3=$_POST["staffid3"];
    $name = $_POST["fname3"];
    $pass=$_POST['passw3'];
    $encr=md5($pass);
    $age = $_POST["age3"];
    $sex = $_POST["sex3"];
    $dob = $_POST["dob3"];
    $address = $_POST["address3"];
    $sal=$_POST["sal3"];
    $phone = $_POST["phone3"];

$sql = "UPDATE STAFF_INFO SET 
STAFF_NAME='$name',
STAFF_PASSWORD='$encr',
STAFF_AGE=$age,
STAFF_DOB='$dob',
STAFF_SEX='$sex',
STAFF_ADDRESS='$address',
STAFF_PHONE='$phone',
STAFF_SALARY=$sal 
WHERE STAFF_ID=$id3";

if ($conn->query($sql) === TRUE) {
  $conn->close();
  
  echo
  "
  <script>
    alert(' Staff updated successfully ');
    document.location.href = 'http://localhost/shop_mgmt/admin/staff/index.php';
  </script>
  ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
