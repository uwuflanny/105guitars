<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="template/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>105°C Guitars</title>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    </head>

    <body class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-3">
            <a class="navbar-brand" href="index.php">
              <img src="images/logo2.png" style="height: 70px;" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse"> 
                <ul class="navbar-nav mr-auto display-5">
                    <li class="nav-item border-left border-secondary px-3"><a class="nav-link" href="products.php"><h4>Products</h4></a></li>
                    <li class="nav-item border-left border-secondary px-3"><a class="nav-link" href="#"><h4>Quality Check</h4></a></li>
                    <li class="nav-item border-left border-secondary px-3"><a class="nav-link" href="#"><h4>About Us</h4></a></li>
                    <li class="nav-item border-left border-secondary px-3 navbar-brand"> 
                        <a href="#" class="position-relative">
                            <img src="images/icons/cart-icon-navbar.png" style="height: 30px;" alt="shopping-cart">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">1<span class="visually-hidden">Articles in cart</span></span>
                            </img>
                        </a>
                    </li>
                </ul>
            </div>
           
        </nav>

        <main>
        <?php if (isset($params["name"])) { require($params["name"]); } ?>
        </main>
        <script src="js/asd.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
