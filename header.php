<?php

// echo $_SESSION['user_id'] . "<br>";
// echo $_SESSION['user_role'] . "<br>";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Online Shopping System</title>
</head>

<body class="">


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary border">
        <div class="container-fluid">
            <a class="navbar-brand" href="/online_shopping_system/main.php">Online Shopping System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <form class="d-flex me-4">
                        <div style="width: 450px;" class="me-2">
                            <input class="form-control" id="search" type="text" placeholder="Search....">
                        </div>
                        <input type="submit" value="Search" class="btn btn-info">
                    </form>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/online_shopping_system/main.php">Home</a>
                    </li>
                    <?php

                    if (!isset($_SESSION['user_role']) && !isset($_SESSION['user_id'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/online_shopping_system/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/online_shopping_system/signup.php">Signup</a>
                        </li>
                    <?php }

                    ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Product
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Laptop</a></li>
                            <li><a class="dropdown-item" href="#">Monitor</a></li>
                            <li><a class="dropdown-item" href="#">Keyboard</a></li>
                            <li><a class="dropdown-item" href="#">Mouse</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Contact Us</a>
                    </li>

                    <?php

                    if (isset($_SESSION['user_role']) && isset($_SESSION['user_id'])) {

                        // echo $_SESSION['user_id'];
                        echo '<li class="nav-item dropdown ">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Profile
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="/online_shopping_system/customer/customer_dashboard.php">Go To Profile</a></li>
                                  <li>
                                  <form action="/online_shopping_system/logout.php" method="POST">
                                      <input type="submit" value="Logout" class="dropdown-item" name="logout_btn">
                                  </form>
                                  </li>
                              </ul>
                            </li>';
                    }

                    ?>
                </ul>

            </div>
        </div>
    </nav>

    <div class="main border" style='position: relative; height:500px;'>

        <div class="mb-5" id="banner" style="height: 200px; background-color:blue; border:2px solid black; position: absolute; width: 100%; height: 50%;">

            <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/online_shopping_system/img/online_shopping_1.jpg" class="d-block w-100" alt="..." height="500">
            </div>
            <div class="carousel-item">
                <img src="/online_shopping_system/img/online_shopping_2.jpg" class="d-block w-100" alt="..." height="500">
            </div>
            <div class="carousel-item">
                <img src="/online_shopping_system/img/online_shopping_3.jpg" class="d-block w-100" alt="..." height="500">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->
        </div>

        <div class="w-50" id="search-result" style="position: absolute;  z-index: 1; margin-left:245px">
            <ul class="list-group" style="border:1px solid black;" id="list-data">

            </ul>
            <script type="text/javascript">
                $(document).ready(function() {

                    $("#search").keyup(function() {

                        var search = $(this).val();
                        if (search != "") {
                            $("#list-data").css('display', 'block');
                            $.ajax({
                                url: 'search.php',
                                method: 'post',
                                data: {
                                    query: search
                                },
                                success: function(response) {

                                    $("#list-data").html(response);
                                }
                            })
                        } else {

                            $("#list-data").css('display', 'none');

                        }




                    });
                })
            </script>

        </div>

    </div>