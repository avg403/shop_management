<html>

<head>
    <title>Live Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="max-width : 50%;">

        <div class="text-center mt-5 mb-4">

            <h2>BILLING ITEMS</h2>
            <button onclick="window.location.href='show_cart.php';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                          GO TO CART</button>
                          <button onclick="window.location.href='day_sale.php';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                          TODAY SALE</button>
                          <button onclick="window.location.href='http://localhost/shop_mgmt/';" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark">
                          HOME</button>



      

        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." autofocus>

    </div>

    <div id="searchresult">

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                //alert(input);

                if (input != "") {
                    $.ajax({

                        url: "livesearch.php",
                        method: "POST",
                        data: {
                            input: input
                        },

                        success: function(data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                            
                            

                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                    
                }

            });
        });
        
    </script>
    
   
</body>

</html>