<html>

<head>
    <title>Live Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php
    include("connection.php");
    $p_idd = $_POST['pro_id'];
    $old_available = $_POST['available'];
    $bill_p_num = $_POST['item_add'];
    $new_available = $old_available - $bill_p_num;

    $sql1 = "UPDATE `products` SET `P_AVAILABLE` = $new_available WHERE `P_ID` = $p_idd ";
    if ($conn->query($sql1) === TRUE) {
    } else {
        echo "available update error";
    }


    $sql2 = "SELECT MAX(BILL_ID) FROM CART";
    $result2 = $conn->query($sql2);
    $row = mysqli_fetch_array($result2);
    $bill_id = $row['MAX(BILL_ID)'];

    if ($bill_id == NULL) {
        $bill_id = 1;
    }

    $bill_p_name = $_POST['pro_name'];
    $bill_p_price = $_POST['pro_price'];
    $bill_p_total = $bill_p_price * $bill_p_num;

    $sql2 = "INSERT INTO CART(BILL_ID,BILL_P_NAME,BILL_P_PRICE,BILL_P_NUM,BILL_P_TOTAL) VALUES ($bill_id,'$bill_p_name',$bill_p_price,$bill_p_num,$bill_p_total)";
    /*
    if ($conn->query($sql1) === TRUE) {

        $query1 = "SELECT * FROM PRODUCTS WHERE P_ID=$p_idd";

        $result1 = mysqli_query($conn, $query1);
    ?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>P_ID</th>
                    <th>P_NAME</th>
                    <th>P_CATEGORY</th>
                    <th>P_COMPANY</th>
                    <th>P_PRICE</th>
                    <th>P_DETAILS</th>
                    <th>P_IMAGE</th>
                    <th>NO OF ITEMS</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
                $p_id = $row['P_ID'];
                $p_name = $row['P_NAME'];
                $p_category = $row['P_CATEGORY'];
                $p_company = $row['P_COMPANY'];
                $p_price = $row['P_PRICE'];
                $p_availabe = $row['P_AVAILABLE'];
                $p_details = $row['P_DETAILS'];
                $p_image = $row['P_IMAGE'];
                $p_temp = 0;
            ?>
                <tr>
                    <td><?php echo $p_id; ?> </td>
                    <td> <?php echo $p_name; ?> </td>
                    <td> <?php echo $p_category; ?> </td>
                    <td> <?php echo $p_company; ?> </td>
                    <td> <?php echo $p_price; ?> </td>
                    <td> <?php echo $p_details; ?> </td>
                    <td> <img src="img/<?php echo $p_image; ?>" width=150 title="<?php echo $p_image ?>"> </td>
                    <td>
                        <?php
                        if ($p_availabe == 0) {
                            echo "<p class='text-danger'>0</p>";
                        } else {
                            echo $p_availabe;
                        }

                        ?>
                        </select>
                    <?php } ?>
                    </td>
                </tr>

            <?php } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        */

    ?>


    </table>
    <br>
    <br>

    <?php
    if ($conn->query($sql2) === TRUE) {

        $query2 = "SELECT * FROM CART WHERE bill_id=1";

        $result2 = mysqli_query($conn, $query2);
    ?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>BILL_ID</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>NO OF ITEMS</th>
                    <th>TOTAL</th>
                </tr>
            </thead>

            <?php

            while ($row = mysqli_fetch_assoc($result2)) {
                $b_id = $row['BILL_ID'];
                $b_name = $row['BILL_P_NAME'];
                $b_price = $row['BILL_P_PRICE'];
                $b_num = $row['BILL_P_NUM'];
                $b_total = $row['BILL_P_TOTAL'];

            ?>

                <tr>
                    <td><?php echo $b_id; ?> </td>
                    <td> <?php echo $b_name; ?> </td>
                    <td> <?php echo $b_price; ?> </td>
                    <td> <?php echo $b_num; ?> </td>
                    <td> <?php echo $b_total; ?> </td>
                </tr>
        <?php }
        }
        ?>
        </table>
        <button onclick="window.location.href='index.php';"> <b>CONTINUE SHOPPING<b></button>
        <br><br><br><br>

        <form action="checkout.php" method="POST">
            CUSTOMER NAME:
            <input type="text" name="cust_name" required><br> <br>
            CUSTOMER ADRESS:
            <input type="text" name="cust_ads" required><br><br>
            CUSTOMER STATE:
            <input type="text" name="cust_state" value="KERALA"><br><br>
            CUSTOMER COUNTRY:
            <input type="text" name="cust_con" value="INDIA"><br><br>
            CUSTOMER PHONE:
            <input type="tel" maxlength="10" name="cust_num" placeholder="0000000000" required><br><br>
            <input type="submit" value="CHECKOUT"><br>
        </form>
</body>

</html>