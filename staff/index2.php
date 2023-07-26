<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Management System - StaffLogin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("./bgpick2.jpg");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.5s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-light-animation {
            position: relative;
            overflow: hidden;
        }

        .btn-light-animation::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .btn-light-animation:hover::after {
            width: 300px;
            height: 300px;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4" id="login-form">
                <h2 class="text-center mb-4">Staff Login</h2>
                <form method="post" action="staff_check.php">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-light-animation">Login</button>
                        <br>
                        <?php

                        $war = $_GET['WAR'];
                        if ($war == 1) {
                            echo '<h4 style="color:red">invalid user name </h4>';
                        } elseif ($war = 2) {
                            echo '<h4 style="color:red">wrong password</h4>';
                        }
                        ?>

                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>