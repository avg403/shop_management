<!DOCTYPE html>
<html>

<head>
    <title>TOTAL</title>
</head>

<body>
    <?php
    include("connection.php");
    $sDay = date("Y-m-d");
    $grand_total_day = 0;





    $sql3 = "SELECT*FROM BILLING where B_DATE LIKE '$sDay'";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            $temp3 = $row['B_TOTAL'];
            $grand_total_day = $grand_total_day + $temp3;
            
        }
        $message="TODAYS SALE :".$grand_total_day;
      
     
        echo
        "<script>
        alert('$message');
        document.location.href = 'http://localhost/shop_mgmt/staff/staff.php';
      </script>
      ";
    }
    
    ?>