<section>
	<div class="wrapper">
		<div class="container">
            <div class="row g-1">
                <?php foreach($params["products"] as $product): ?>

				<div class="col-md-3">
					<div class="card p-3 mt-5 me-3 ms-3 card_product">
						<div class="text-center" class="bg-transparent"> 
							<img src="images/guitar3.png" class="card-img-top w-50"> 
						</div>
						<div class="product-details"> 
							<span class="font-weight-bold d-block product_text">$ 7.00 <br>solar megaa swagger</span>
						</div>
					</div>
                </div>

                <?php endforeach; ?>

			</div>
		</div>
	</div>
</section>
