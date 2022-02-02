<section class="cart" class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
            <!--
                <div class="card bg-dark">
                    <div class="card-header px-4 py-5">
                        <h5 class="mb-0 text-light">Cart</h5>
                    </div>

                    <div class="card-body p-4">
                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <?php foreach($params["articles"] as $article): ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?php echo "./images/products/".$article->img; ?>" class="img-fluid" alt="Phone">
                                        </div>
                                        <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0"><?php echo $article->namee; ?></p>
                                        </div>
                                        <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small"><?php echo $article->price."$"; ?></p>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-danger">Rimuovi</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
 
                            <div class="d-flex justify-content-between p-2">
                                <button type="button" class="btn btn-success w-25 p-3 ms-4">Compra</button>
                                <p class="text-light mb-0 w-25 p-3"><span class="fw-bold me-4 ">Total</span> $898.00</p>
                            </div>
                        </div>
                    </div>
                
                </div>
                -->

                <article>
                    <header>
                        <h2 class="text-light">Cart</h2>
                    </header>

                    <section class="cart-section">
                        <table class="table table-dark table-stripe table-striped">
                            <thead>
                                <th scope="col">Product image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                            <?php foreach($params["articles"] as $article): ?>
                                <tr>
                                    <td><img src="<?php echo "./images/products/".$article->img; ?>" class="" style="width: 60%;"></td>
                                    <td class=""><?php echo $article->namee; ?></td>
                                    <td><?php echo $article->price."$"; ?></td>
                                    <td><button type="button" class="btn btn-danger">Rimuovi</button></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                    <footer>
                        <button type="button" class="btn btn-success w-25">Compra</button>
                    </footer>
                </article>


            </div>
        </div>
    </div>
</section>
