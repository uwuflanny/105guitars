<section class="mt-1">
	<div class="wrapper">
        <div class="container">
            <form class="row g-1" action="#" method="GET">
                <div class="col-sm-2">
                    <label for="filter-box" class="form-label text-light">Show models:</label>
                </div>

                <div class="col-sm-4">
                    <select id="filter-box" name="model" class="form-select">
                        <option value="all">All</option>
                        <?php foreach ($params["models"] as $model): ?>
                        <option value="<?php echo $model["codice"]; ?>" <?php if ($model["codice"] == $_GET["model"]) { echo "selected"; } ?> >
                            <?php echo $model["nome"]; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" value="Filter">
                </div>
            </form>

            <div class="row g-1">
                <?php foreach($params["products"] as $product): ?>

				<div class="col-md-3">
					<div class="card p-3 mt-5 me-3 ms-3 card_product">
						<div class="text-center" class="bg-transparent">
							<img src="<?php echo "./images/products/".$product["front_image"] ?>" class="card-img-top product_card" alt="instrument image">
						</div>
						<div class="product-details">
                            <span class="font-weight-bold d-block product_text">
                            $<?php echo $product["prezzo"]; ?>
                            <br>
                            <?php echo $product["nome"]; ?>
                            </span>
                        </div>
                        <a href="view_product.php?serial=<?php echo $product["seriale"]; ?>" class="stretched-link" title="view product specifications"></a>
					</div>
                </div>

                <?php endforeach; ?>

			</div>
		</div>
	</div>
</section>
