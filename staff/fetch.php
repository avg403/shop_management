
    <?php
    include("connection.php");
    $p_idd = $_POST['pro_id'];
    $old_available = $_POST['available'];
    $bill_p_num = $_POST['item_add'];
    $bill_p_name = $_POST['pro_name'];
    
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

   
    $bill_p_price = $_POST['pro_price'];
    $bill_p_total = $bill_p_price * $bill_p_num;


    
//newwwww

$query3="SELECT * FROM CART";
$result3 =mysqli_query($conn, $query3);
$count=0;

while ($row = mysqli_fetch_assoc($result3)) {
    $temp_p_id=$row["P_ID"];
    $temp_num=$row["BILL_P_NUM"];


    if($temp_p_id===$p_idd)
    {
        $bill_p_num=$bill_p_num+$temp_num;
        $bill_p_total = $bill_p_price * $bill_p_num;
       

        $sql4 = "UPDATE `cart` SET 
        `BILL_P_NUM`=$bill_p_num,`BILL_P_TOTAL`=$bill_p_total WHERE `P_ID`=$p_idd ";


        if ($conn->query($sql4) === TRUE) {
            $count=1;
            echo
            "<script>
            alert(' item added successfully 1');
            document.location.href = 'http://localhost/shop_mgmt/staff/staff.php';
          </script>
          ";
            break;
    } else {
        echo "product cart update error";
    }

    }

}

if ($count!=1){
    $sql2 = "INSERT INTO CART(BILL_ID,P_ID,BILL_P_NAME,BILL_P_PRICE,BILL_P_NUM,BILL_P_TOTAL) VALUES ($bill_id,$p_idd,'$bill_p_name',$bill_p_price,$bill_p_num,$bill_p_total)";
    echo
            "<script>
            alert(' item added successfully 2');
            document.location.href = 'http://localhost/shop_mgmt/staff/staff.php';
          </script>
          ";
}

    ?>

