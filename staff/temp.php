<?php
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
        ?>