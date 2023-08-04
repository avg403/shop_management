<html>

<body>
    
</table><head>
    <title>CART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

    <br>
    <br>

    <?php
    include("connection.php");


        $query2 = "SELECT * FROM CART WHERE bill_id=1";

        $result2 = mysqli_query($conn, $query2);
        if ($result2->num_rows > 0) {
    ?>
        <table border class="table table-bordered table-striped mt-4">
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
            $id=1;
            
            while ($row = mysqli_fetch_assoc($result2)) {
                $b_id = $row['BILL_ID'];
                $b_name = $row['BILL_P_NAME'];
                $b_price = $row['BILL_P_PRICE'];
                $b_num = $row['BILL_P_NUM'];
                $b_total = $row['BILL_P_TOTAL'];

            ?>

                <tr>
                    <td><?php echo $id ; $id++; ?> </td>
                    
                    <td> <?php echo $b_name; ?> </td>
                    <td> <?php echo $b_price; ?> </td>
                    <td> <?php echo $b_num; ?> </td>
                    <td> <?php echo $b_total; ?> </td>
                </tr>
        <?php }
        
        ?>
        </table>
        <button style="margin: 0px 10px;" onclick="window.location.href='staff.php'; "> <b>ADD ITEM<b></button>
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
        <?php }
        else{
             echo"
            <script>
            alert('no items added  ');
            document.location.href = 'http://localhost/shop_mgmt/staff/staff.php';
          </script>
          ";
        }
        ?>
</body>

</html>