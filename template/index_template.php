
        <!--
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="images/solar2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="images/solar1.jpg" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </div>
        </div>-->


       

        <header>
            <div id="website_welcome" class="py-5 text-center bg-image">
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white">
                            <h1 class="mb-3">105°C Guitars</h1>
                            <h2 class="mb-3">HIGH QUALITY GUITARS AND BASSES</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <section id="features">
            <div class="container">
                <div class="row text-center text-light">
                    <div class="col-md-4">      
                        <img src="images/icons/quality.png" class="img-fluid feature_image" alt="quality_icon"/>
                        <p class="mt-2">Our guitars possess exceptional durability.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="images/icons/handmade.png" class="img-fluid feature_image" alt="handmade icon"/>
                        <p class="mt-2">Our instruments are crafted by expert luthiers.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="images/icons/express.png" class="img-fluid feature_image" alt="shipping icon"/>
                        <p class="mt-2">We grant express shipping worldwide.</p>
                    </div>
                </div>
            </div>
        </section>
        

        <div class="container text-light py-5 px-5 rounded index_card">
            <div class="row">
                <div class="col-lg-6">
                    <img src="images/horizontal.png" class="img-fluid rounded-3" alt="guitar">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-contents-center">
                    <div class="content pt-4 pt-lg-0">
                    <h3>Why our instruments are differen</h3>
                    <p class="fst-italic">                        
                        This is why we are sure that 105°C is the perfect temperature to roast the wood of our instruments:
                    </p>
                    <ul>                        
                        <li><strong class="bi bi-check-circle"></strong> Only a long exposure at 105° grants our instruments their particular toffee brown color.</li>
                        <li><strong class="bi bi-check-circle"></strong> Medium-High temperature increase our guitar neck's endurance against humidity changes.</li>                        
                        <li><strong class="bi bi-check-circle"></strong> The treatment we offer greatly enhaces an instrument's ability to withstand violent bumps.</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-light py-5 px-5 rounded index_card">
            <div class="row">                
                <div class="col-lg-6 d-flex flex-column justify-contents-center">
                    <div class="content pt-4 pt-lg-0">
                    <h3>Our products</h3>
                    <p class="fst-italic">
                    Ours is a high level lutherie, our instruments are realized aiming at those with the necessity to purchase a piece of art, a guitar able to last a lifetime.                    
                    </p>
                    <ul>                        
                        <li><strong class="bi bi-check-circle"></strong> Creating our products takes time, we always sell limited amounts to keep out standards high.</li>                        
                        <li><strong class="bi bi-check-circle"></strong> Our products are realized following strict standards, enstablished by our well-trained artisans.</li>
                        <li><strong class="bi bi-check-circle"></strong> We do not aim to be known worldwide, we prefer to keep a small but loyal fanbase.</li>
                    </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="images/luthier.jpg" class="img-fluid rounded" alt="production image">
                </div>
            </div>
        </div>

<h2 class="text-center text-light mt-5">some of our available products</h2>
<div class="container mt-1">
    <div class="row">
        <?php
        foreach ($params["rand_nums"] as $id):
            $product = $params["products"][$id];
        ?>
        <div class="col-md-4">
            <div class="card p-3 mt-5 me-3 ms-3 card_product">
                <div class="text-center" class="bg-transparent">
                    <img src="<?php echo "./images/products/" . $product["front_image"]; ?>" class="card-img-top product_card" alt="product preview">
                </div>
                <div class="product-details">
                    <span class="font-weight-bold d-block product_text"> <?php echo $product["nome"]; ?> </span>
                </div>
                <a href="view_product.php?serial=<?php echo $product["seriale"]; ?>" class="stretched-link" title="product view"></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
