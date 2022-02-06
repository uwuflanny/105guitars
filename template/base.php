<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="template/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>105°C Guitars</title>
        <script src="<?php echo $params["jquery-source"]; ?>"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-3">
            <a class="navbar-brand px-3" href="index.php">
              <img src="images/logo2.png" style="height: 70px;" />
            </a>
            <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto display-5">
                    <li class="nav-item border-left border-secondary px-3">
                        <a class="nav-link" href="products.php">
                            <h4>Products</h4>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item border-left border-secondary px-3">
                        <a class="nav-link" href="#">
                            <h4>Quality Check</h4>
                        </a>
                    </li>
                    <li class="nav-item border-left border-secondary px-3">
                        <a class="nav-link" href="#">
                            <h4>About Us</h4>
                        </a>
                    </li>-->
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item border-left border-secondary px-3">
                        <a class="nav-link" href="<?php echo $params["profile-url"];?>">
                            <h4><?php echo empty($params["user-name"]) ? "Login" : $params["user-name"]."'s Profile"; ?></h4>
                        </a>
                    </li>
                    <li class="nav-item border-left border-secondary navbar-brand px-3">
                        <a href="cart.php" class="position-relative">
                            <img src="images/icons/cart-icon-navbar.png" style="height: 30px;" alt="shopping-cart">
                            <span class="cart-number position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                                <?php
                                   echo $params["articles-in-cart"];
                                ?>
                                <span class="visually-hidden">Articles in cart</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

        </nav>

        <main>
            <?php if (isset($params["name"])) { require($params["name"]); } ?>
        </main>
        <?php if (isset($params["scripts"])): ?>
            <?php foreach ($params["scripts"] as $script): ?>
                <script src="<?php echo $script; ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>

        <footer class="fixed-bottom">
            <center class="text-white py-4 bg-dark">
                Copyright (c) 105 guitars. All rights reserved.
            </center>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
