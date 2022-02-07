<section class="order" class="h-100 gradient-custom">
	<div class="container py-5 h-100">


		<?php foreach($params["orders"] as $order): ?>
			<div class="row d-flex justify-content-center align-items-center h-100 mb-5">
			<div class="col-lg-10 col-xl-8">
				<div class="card bg-dark" style="border-radius: 10px;">
					<div class="card-header px-4 py-5">
						<h5 class="text-light mb-0">data dell'ordine: <?php echo $order["data_ordine"]; ?></h5>
					</div>
					<div class="card-body p-4">
						<div class="d-flex justify-content-between align-items-center mb-4">
							<p class="lead fw-normal mb-0 text-light">Receipt</p>
							<p class="small text-light mb-0">CODICE ORDINE: <?php echo $order["codice_ordine"]; ?></p>
						</div>
						<div class="card shadow-0 border">						
							<?php foreach($params["specifications"][$order["codice_ordine"]][0] as $item): ?>
                                <div class="card-body">
									<div class="row">
										<div class="col-md-2">
											<img src="<?php echo "./images/products/".$item["side_image"] ?>" class="img-fluid" alt="Phone">
										</div>
										<div
											class="col-md-2 text-center d-flex justify-content-center align-items-center">
											<p class="text-muted mb-0">Samsung Galaxy</p>
										</div>
										<div
											class="col-md-2 text-center d-flex justify-content-center align-items-center">
											<p class="text-muted mb-0 small">Qty: 1</p>
										</div>
										<div
											class="col-md-2 text-center d-flex justify-content-center align-items-center">
											<p class="text-muted mb-0 small">Qty: 1</p>
										</div>
										<div
											class="col-md-2 text-center d-flex justify-content-center align-items-center">
											<p class="text-muted mb-0 small">$399</p>
										</div>
										<div
											class="col-md-2 text-center d-flex justify-content-center align-items-center">
											<p class="text-muted mb-0 small">gay</p>
										</div>
									</div>
								</div>
							<?php endforeach; ?>						
						</div>

						<div class="d-flex justify-content-between pt-2">
							<p class="text-light mb-0"><span class="fw-bold me-4">Total</span><?php echo $params["specifications"][$order["codice_ordine"]][1] ?>$</p>
						</div>
						<hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
						<div class="accordion" id="accordionExample">
							<!--
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
									<button class="accordion-button" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseOne" aria-expanded="true"
										aria-controls="collapseOne">
										Dettagli ordine
									</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show"
									aria-labelledby="headingOne" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<div class="d-flex justify-content-between pt-2">
											<p class="fw-bold mb-0">SCONTO</p>
											<p class="text-muted mb-0"><span class="fw-bold me-4">0%</span> </p>
										</div>
									</div>
								</div>
							</div>
							-->
								
							<figure class="text-center text-light">
								<blockquote class="blockquote">
									<p>Order status: <?php echo $order["stato"] ?></p>
								</blockquote>
								<?php 
									switch ($order["stato"]){
										case "unprepared":
											echo "your order has yet to be prepared";
											break;
										case "unsent":
											echo "your order has been packed, but not shipped";
											break;
										case "sent":
											echo "your order has been shipped";
											break;
										case "delivered":
											echo "order completed";
											break;
									}
								?>
							</figure>	

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>


		

		
	</div>
</section>