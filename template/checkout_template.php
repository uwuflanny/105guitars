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

    <body class="bg-dark text-light">

        <main>
            <div class="row mt-5">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row">

                        <div class="col-md-4 order-md-2">
                            <h2>Total: <?php echo $params["total"]; ?>&euro;<h2>
                        </div>

                        <div class="col-md-8 order-md-1">
                            <form action="#" method="POST" class="needs-validation">
                                <h1 class="mb-3">Payment</h1>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="credit" name="paymentMethod" type="radio" value="credit" class="custom-control-input" checked required>
                                            <label class="custom-control-label" for="credit">Credit card</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="debit" name="paymentMethod" type="radio" value="debit" class="custom-control-input" required>
                                            <label class="custom-control-label" for="debit">Debit card</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-name">Name on card</label>
                                            <input type="text" class="form-control" id="cc-name" name="name" placeholder="" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-number">Credit card number</label>
                                            <input type="number" class="form-control" id="cc-number" name="number" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="cc-expiration">Expiration</label>
                                            <input type="month" class="form-control" id="cc-expiration" name="expiration" placeholder="2030-05" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="cc-expiration">CVV</label>
                                            <input type="number" class="form-control" id="cc-cvv" name="cvv" placeholder="" required>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </main>

        <footer class="fixed-bottom">
            <center class="text-white py-4 bg-dark">
                Copyright (c) 105 guitars. All rights reserved.
            </center>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
