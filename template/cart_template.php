<section class="cart" class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
                <article class="card bg-dark">
                    <header class="card-header px-4 py-5">
                        <h5 class="mb-0 text-light">Cart</h5>
                    </header>

                    <div class="card-body p-4">
                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <?php if(is_set_and_not_empty($params["articles"])):?>
                                <?php foreach($params["articles"] as $article): ?>
                                    <article class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo "./images/products/".$article->img; ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-5 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0"><?php echo $article->namee; ?></p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small"><?php echo $article->price."$"; ?></p>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-danger">Remove</button>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                                <?php else:?>
                                    <p>Your cart is empty :(</p>
                                <?php endif;?>
                            </div>
 
                           
                        </div>
                           
                    </div>
                        <?php if(is_set_and_not_empty($params["articles"])):?>
                        <footer class="d-flex justify-content-between p-2">
                            <button type="button" class="btn btn-success w-25 p-3 ms-4">Buy now</button>
                            <p class="text-light mb-0 w-25 p-3"><span class="fw-bold me-4 ">Total</span><?php echo $params["total-cost"]."$";?></p>
                        </footer>
                        <?php endif;?>
                </article>

            </div>
        </div>
    </div>
</section>
