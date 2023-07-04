<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <?php include('../components/navbar.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $img = ['dove.jpeg', 'oneplus.jpeg', 'nescafe.jpeg'];
            foreach ($img as $i) {

            ?>


                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col">
                                <img style="width: 60%; aspect-ratio: 1/1; object-fit: contain; background-color: #fff;" src="img/<?php echo $i; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="col">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quo qui corporis, quidem tempore architecto natus? Minima sint corrupti eligendi ab asperiores dicta nobis laborum quas! Qui distinctio veritatis soluta!</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>