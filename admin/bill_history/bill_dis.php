<!DOCTYPE html>
<html>

<head>
    <title>BANKAI</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</head>

<body>
    <?php
    include("connection.php");
    $bill_id = $_GET["id"];
    $sql = "SELECT*FROM BILLING where BILL_ID=$bill_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $grand_total = $row['B_TOTAL'];
            $sDate = $row['B_DATE'];
            $sTime = $row['B_TIME'];
        }
    }
    ?>

    <!------------------------------------------------------------------------------------------------------------------------------------------>

    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">BILL ID >> <strong>ID: <?php echo "#000" . $bill_id ?></strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a href="javascript:window.print()" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
                        <button id="download" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</button>
                        <button onclick="window.location.href='http://localhost/shop_mgmt/admin/admin.php';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i class="fa fa-home"></i>
                            Home</button>
                    </div>
                    <hr>
                </div>

                <div id="invoice" class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa fa-4x ms-0" style="color:#5d9fc5 ;">BILLING</i>
                            <p class="pt-0">AZbills.com</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <!--                        
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;"> NOONE</span></li>
                                <li class="text-muted"> SOME STREET</li>
                                <li class="text-muted">KERALA INDIA</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 0000000000</li>
                            </ul>
        -->
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Bill Details</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span><?php echo "#000" . $bill_id ?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Purchase Date: </span> <?php echo $sDate; ?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Purchase Time: </span> <?php echo $sTime; ?> </li>

                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $s_id = 0;

                                $sql2 = "SELECT*FROM BILL1 where BILL_ID=$bill_id";
                                $result2 = $conn->query($sql2);

                                if ($result2->num_rows > 0) {
                                    while ($row = $result2->fetch_assoc()) {
                                        $s_id = $s_id + 1;
                                        $bill_name = $row['BILL_P_NAME'];
                                        $bill_price = $row['BILL_P_PRICE'];
                                        $bill_num = $row['BILL_P_NUM'];
                                        $bill_total = $row['BILL_P_TOTAL'];

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $s_id; ?></th>
                                            <td><?php echo $bill_name; ?></td>
                                            <td><?php echo $bill_num; ?></td>
                                            <td><?php echo $bill_price; ?></td>
                                            <td><?php echo $bill_total; ?></td>
                                        </tr>
                                <?php

                                    }
                                }
                                ?>

                            </tbody>

                        </table>


                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">*****</p>

                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>₹<?php echo $grand_total; ?></li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(0%)</span>₹0</li>
                            </ul>
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">₹<?php echo $grand_total; ?></span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for your purchase</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>