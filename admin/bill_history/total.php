<!DOCTYPE html>
<html>

<head>
    <title>TOTAL</title>
</head>

<body>
    <?php
    include("connection.php");

    $sYear = date("Y");
    $sMonth = date("Y-m");
    $sDay = date("Y-m-d");
    $grand_total_year = 0;
    $grand_total_month = 0;
    $grand_total_day = 0;





    $sql1 = "SELECT*FROM BILLING where B_DATE LIKE '$sYear%'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $temp1 = $row['B_TOTAL'];
            $grand_total_year = $grand_total_year + $temp1;
        }
    }


    $sql2 = "SELECT*FROM BILLING where B_DATE LIKE '$sMonth%'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $temp2 = $row['B_TOTAL'];
            $grand_total_month = $grand_total_month + $temp2;
        }
    }



    $sql3 = "SELECT*FROM BILLING where B_DATE LIKE '$sDay'";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        while ($row = $result3->fetch_assoc()) {
            $temp3 = $row['B_TOTAL'];
            $grand_total_day = $grand_total_day + $temp3;
        }
    }

    ?>

    <h1>
        YEAR : <?php echo $grand_total_year; ?><br>
        MONTH: <?php echo $grand_total_month; ?></br>
        DAY: <?php echo $grand_total_day; ?></br>
        <br>
        <button onclick="window.location.href='http://localhost/shop_mgmt/admin/admin.php';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">ADMIN</button>

    </h1>