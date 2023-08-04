<htmL>

<body>
    
    <?php
    include("connection.php");
    if (isset($_POST['input'])) {

        $input = $_POST['input'];
        $query = "SELECT * FROM PRODUCTS WHERE 
                P_NAME LIKE '{$input}%'
                OR P_COMPANY LIKE '{$input}%' 
                OR P_DETAILS LIKE '{$input}%'";

        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result) > 0) { ?>

            <table class="table table-bordered table-striped mt-4" style="border-spacing: 0px;">
                <thead>
                    <tr>
                        <th style="width:5%;">P_ID</th>
                        <th style="width:15%;">P_NAME</th>
                        <th style="width:10%;">P_CATEGORY</th>
                        <th style="width:10%;">P_COMPANY</th>
                        <th style="width:10%;">P_PRICE</th>
                        <th style="width:20%;">P_DETAILS</th>
                        <th style="width:15%;">P_IMAGE</th>
                        <th style="width:8%;">NO OF ITEMS</th>
                        <th style="width:7%;">ADD</th>

                    </tr>
                </thead>
            </table>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <form action="fetch.php" method="POST">
                    
                    <?php
                    $p_id = $row['P_ID'];
                    $p_name = $row['P_NAME'];
                    $c_id = $row['C_ID'];
                    $p_company = $row['P_COMPANY'];
                    $p_price = $row['P_PRICE'];
                    $p_availabe = $row['P_AVAILABLE'];
                    $p_details = $row['P_DETAILS'];
                    $p_image = $row['P_IMAGE'];
                    $p_temp = 0;
                    

                    $query2 = "SELECT * from category where c_id=$c_id";
    
            $result2 = mysqli_query($conn, $query2);
    
    
            if (mysqli_num_rows($result2) > 0){
            while ($row2 = mysqli_fetch_assoc($result2)) { 
                {$cat= $row2["P_CATEGORY"];}}}
                ?>


                 
                    <table class="table table-bordered table-striped mt-4 ">

                        <tr>
                            <td style="width:5%;">
                                <input type="hidden" name="pro_id" value="<?php echo $p_id; ?>" />
                                <?php echo $p_id; ?>
                            </td>
                            <td style="width:15%;">
                                <input type="hidden" name="pro_name" value="<?php echo $p_name; ?>" />
                                <?php echo $p_name; ?>
                            </td>
                            <td style="width:10%;"> <?php echo $cat; 
                                                    ?> </td>
                            <td style="width:10%;"> <?php echo $p_company; ?> </td>
                            <td style="width:10%;">
                                <input type="hidden" name="pro_price" value="<?php echo $p_price; ?>" />
                                <?php echo $p_price; ?>
                            </td>
                            <td style="width:20%;"> <?php echo $p_details; ?> </td>
                            

                            <td style="width:15%;"> <img src="http://localhost/shop_mgmt/admin/product/img/<?php echo $p_image; ?>" width=150 title="<?php echo $p_image ?>"> </td>
                            <td style="width:8%;"><input type="hidden" name="available" value="<?php echo $p_availabe; ?>" />
                                <?php
                                if ($p_availabe == 0) {
                                    echo "<p class='text-danger'>Not Available</p>";
                                } else { ?>
                                    <select name="item_add">
                                        <?php while ($p_availabe > 0) {
                                            $p_temp = $p_temp + 1 ?>
                                            <option value="<?php echo $p_temp ?>" id="<?php echo $p_temp ?>"> <?php echo $p_temp ?> </option>
                                        <?php $p_availabe = $p_availabe - 1;
                                        }

                                        ?>
                                    </select>
                                <?php } ?>
                            </td>
                            </td>
                            <td style="width:7%;"> <?php
                                                    if ($p_temp == 0) {
                                                        echo "<p class='text-danger'>Not Available</p>";
                                                    } else { ?>
                                    <button type="submit" name="submit">ADD</button>
                                <?php } ?>

                            </td>
                        </tr>

                        </tbody>
                    </table>
                </form>
                <!--<div style="position:fixed; width:100%; height:70px; padding:5px; bottom:0px; "> -->
    

    
    <?php
            }
        } else {
            echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
        }
    }
    ?>


</body>

</html>