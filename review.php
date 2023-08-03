<?php 
require 'connection.php';
 
    $sql="SELECT MAX(R_ID) FROM REVIEW";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array( $result );
    $maxid=$row['MAX(R_ID)'];
  
    $id=$maxid+1;
    $name = $_POST["name"];
    $mail = $_POST["email"];
     $phone = $_POST["phone"];
    $review = $_POST["message"];
  
    $query = $conn->prepare('INSERT INTO REVIEW(R_ID,R_NAME,R_MAIL,R_PHONE,R_REV)
        VALUES (?,?,?,?,?);');
  
    $query->bind_param('issss',$id,$name,$mail,$phone,$review);
  
    $query->execute();
    mysqli_close($conn);
  
  
    echo
    "
    <script>
      alert(' REVIEW ADDED SUCCESFULLY  ');
      document.location.href = 'http://localhost/shop_mgmt/index.php';
    </script>
    ";


?>