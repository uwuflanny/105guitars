<section class="mt-1">
	<div class="wrapper">
		<div class="container">
            <div class="row g-1">
                <?php foreach($params["products"] as $product): ?>

				<div class="col-md-3">
					<div class="card p-3 mt-5 me-3 ms-3 card_product">
						<div class="text-center" class="bg-transparent">
							<img src="<?php echo "./images/products/".$product["front_image"] ?>" class="card-img-top product_card">
						</div>
						<div class="product-details">
                            <span class="font-weight-bold d-block product_text">
                            $<?php echo $product["prezzo"]; ?>
                            <br>
                            <?php echo $product["nome"]; ?>
                            </span>
                        </div>
                        <a href="view_product.php?serial=<?php echo $product["seriale"]; ?>" class="stretched-link"></a>
					</div>
                </div>

                <?php endforeach; ?>

			</div>
		</div>
	</div>
</section>
