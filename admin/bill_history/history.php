<!DOCTYPE html>
<html>

<head>
    <title>BILLS</title>
</head>

<body>
    <?php
    include("connection.php");
    $query = "SELECT BILL_ID FROM billing ORDER BY BILL_ID DESC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bill_id = $row['BILL_ID']; ?>
            <a href="bill_dis.php?id=<?php echo $bill_id; ?>"> BILL #000<?php echo $bill_id ?></a><br>
    <?php
        }
    }
    ?>
</body>

</html>