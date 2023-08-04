<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="shop management project website that gives the details of shop products" />

    <title>Shop management System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <?php include('components/navbar.php') ?>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Shop!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Life is for services!</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">In-person customer service</h4>
                    <p class="text-muted">You can seek direct assistance from our store employees,ask questions about products and get recommendations based on your preferences and needs.</p>

                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Return and Exchange </h4>
                    <p class="text-muted">You can visit our store directly to resolve issues regarding the recent purchase.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Physical Security</h4>
                    <p class="text-muted">we provide secure environment as you can physically inspect the product before paying for it.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Products grid-->
    <section class="page-section bg-light" id="products">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Products</h2>
                <h3 class="section-subheading text-muted">You can always find something.</h3>
            </div>
            <button onclick="window.location.href='#clothes';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                CLOTHING AND APPAREL</button>
            <button onclick="window.location.href='#cosmetics';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                COSMETICS</button>
                <button onclick="window.location.href='#footware';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                FOOTWARE AND SHOES</button>
                <button onclick="window.location.href='#electronics';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                ELECTRONICS AND GADJETS</button>
                <button onclick="window.location.href='#toys';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                GAMES AND TOYS</button>
                <button onclick="window.location.href='#pet';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                VETERINARY AND PET ITEMS</button>
                
                <button onclick="window.location.href='#stationary';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                STATIONARY</button>
                <button onclick="window.location.href='#tupperware';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                TUPPERWARE</button>
                <button onclick="window.location.href='#sports';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                SPORTS PRODUCT</button>
        </div>
    </section>





                <section id="clothes">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=1";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>


















            <section id="cosmetics">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=2";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=2";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>

    </section>



    <section id="footware">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=3";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=3";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>





            <section id="electronics">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=4";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=4";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>


            <section id="toys">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=5";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>

            <section id="pet">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=6";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=6";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                        </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>



            <section id="stationary">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=7";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=7";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>

            <section id="tupperware">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=8";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=8";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>

            <section id="sports">
                <div class="row">

                    <?php
                    require 'connection.php';
                    $sql = "SELECT *FROM products WHERE C_ID=9";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {

                            $pid = $row["P_ID"];
                            $pname = $row["P_NAME"];
                            $pprice = $row["P_PRICE"];
                            $pdetails = $row["P_DETAILS"];
                            $pimage = $row["P_IMAGE"];

                            $message =  $count . "portfolio";
                            $query2 = "SELECT * from category where c_id=9";
                            $result2 = mysqli_query($conn, $query2);

                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) { {
                                        $cat = $row2["P_CATEGORY"];
                                    }
                                }
                            }

                    ?>

                            <div class="col-lg-4 col-sm-6 mb-4">
                                <!-- Product item 1-->
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#<?php echo "$pname" ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"></div>
                                        </div>
                                        <img class="img-fluid" src="http://localhost/shop_mgmt/admin/product/img/<?php echo $pimage; ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"> <?php echo "$pname" ?></div>
                                        <div class="portfolio-caption-subheading text-muted"><?php echo "$cat" ?></div>
                                    </div>
                                </div>
                            </div>

                           
                    <?php    }
                    } ?>
                </div>

            </section>


   
    


    

    </section>

















































    



    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Let's Start a Conversation</h3>
            </div>
            <form action="review.php" id="contactForm" method="post" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" name="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" name="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" name="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                </div>


                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="register" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>



    <!--
         <div class="portfolio-modal modal fade" id="<?php //echo "$pname" ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="close-modal" data-bs-dismiss="modal"><img src="./img/close-icon.svg" alt="Close modal" /></div>
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <div class="modal-body">
                                                      
                                                        <h2 class="text-uppercase"><?php //echo "$pname" ?></h2>

                                                        <img class="img-fluid d-block mx-auto" src="http://localhost/shop_mgmt/admin/product/img/<?php //echo $pimage; ?>" alt="..." />
                                                        <p><?php //echo "$pdetails" ?></p>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <strong>Price:</strong>
                                                                Rs.<?php //echo "$pprice" ?>
                                                            </li>
                                                            <li>
                                                                <strong>Category:</strong>
                                                                <?php //echo "$cat" ?>
                                                            </li>
                                                        </ul>
                                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                            <i class="fas fa-xmark me-1"></i>
                                                            Close Product
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    -->
</body>

</html>