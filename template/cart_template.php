<?php 
$alertValue = !isset($params["articles"]) || empty($params["articles"]) ? "" : "visually-hidden";
?>

<section class="cart" class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">

                <?php if(is_set_and_not_empty($params["articles"])):?>
                    <article class="card bg-dark">
                        <header class="card-header px-4 py-5">
                            <h5 class="mb-0 text-light">Cart</h5>
                        </header>

                        <div class="card-body p-4">
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <?php foreach($params["articles"] as $article): ?>
                                        <article class="row" id="<?php echo $article->serial; ?>">
                                            <div class="col-md-3">
                                                <img src="<?php echo "./images/products/".$article->img; ?>" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-md-5 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0"><?php echo $article->namee; ?></p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small item-price"><?php echo $article->price."$"; ?></p>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-danger btnRemove" value="<?php echo $article->serial; ?>" class="btn btn-danger">Remove</button>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                   
                                </div>
     
                               
                            </div>
                               
                        </div>
                            <footer class="d-flex justify-content-between p-2">
                                <button type="button" class="btn btn-success w-25 p-3 ms-4">Buy now</button>
                                <p class="text-light fw-bold mb-0 w-25 p-3">
                                    <span class="fw-bold me-4 ">Total</span>
                                    <span id="price"><?php echo $params["total-cost"]."$";?></span>
                                </p>
                            </footer>
                            
                    </article>

                <?php endif;?>
                <div class="alert alert-primary <?php echo $alertValue; ?>" role="alert">
                    Your cart is empty :(
                </div>

            </div>
        </div>
    </div>
</section>
