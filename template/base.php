<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>105°C Guitars</title>

        <style>
            body {
                color: white;
                background-image: url("images/grey.jpg");
            }

            main {
                margin-top: 10em;
                overflow: hidden;
            }

            .img-icon {
                width: 3em;
                height: 3em;
            }

            .img-gallery {
                width: 20%;
            }

            
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-3">
            <a class="navbar-brand" href="#">
              <img src="images/logo2.png" style="height: 70px;" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                <ul class="navbar-nav mr-auto display-5">
                    <li class="nav-item border-left border-secondary px-3"><a class="nav-link" href="#"><h4>Products</h4></a></li>
                    <li class="nav-item border-left border-secondary px-3"><a class="nav-link" href="#"><h4>Quality Check</h4></a></li>
                    <li class="nav-item border-left border-secondary px-3"><a class="nav-link" href="#"><h4>About Us</h4></a></li>
                </ul>
            </div>
        </nav>

        <main>
        <?php if (isset($params["name"])) { require($params["name"]); } ?>
        </main>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>