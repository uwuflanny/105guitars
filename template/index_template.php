
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
                        <p class="mt-2">Garantiamo ai nostri clienti degli strumenti durevoli e sempre dalle prestazioni eccellenti.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="images/icons/handmade.png" class="img-fluid feature_image" alt="handmade icon"/>
                        <p class="mt-2">Tutti i nostri strumenti sono interamente prodotti a mano da dei liutai esperti.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="images/icons/express.png" class="img-fluid feature_image" alt="shipping icon"/>
                        <p class="mt-2">Il tuo strumento verrà spedito direttamente a casa tua. La spedizione è disponibile solamente in cina</p>
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
                    <h3>test header</h3>
                    <p class="fst-italic">
                        Ecco perche 105°C è la temperatura perfetta per arrostire il legno dei manici dei nostri strumenti:
                    </p>
                    <ul>
                        <li><strong class="bi bi-check-circle"></strong> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><strong class="bi bi-check-circle"></strong> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><strong class="bi bi-check-circle"></strong> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperd</li>
                    </ul>
                    <p>
                        E' questo che conferisce ai nostri strumenti il loro caratteristico feel
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-light py-5 px-5 rounded index_card">
            <div class="row">                
                <div class="col-lg-6 d-flex flex-column justify-contents-center">
                    <div class="content pt-4 pt-lg-0">
                    <h3>BOH</h3>
                    <p class="fst-italic">
                    你不知道你有多可爱
                    跌倒后会傻笑着再站起来
                    你从来都不轻言失败
                    对梦想的执着一直不曾更改
                    很安心 当你对我说
                    不怕有我在 放着让我来
                    勇敢追自己的梦想 那坚定的模样:
                    </p>
                    <ul>
                        <li><strong class="bi bi-check-circle"></strong> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><strong class="bi bi-check-circle"></strong> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><strong class="bi bi-check-circle"></strong> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperd</li>
                    </ul>
                    <p>
                        E' questo che conferisce ai nostri strumenti il loro caratteristico feel
                    </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="images/luthier.jpg" class="img-fluid rounded" alt="production image">
                </div>
            </div>
        </div>

<h2 class="text-center text-light mt-5">ecco alcuni dei nostri prodotti</h2>
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
