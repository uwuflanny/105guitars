<section>
	<div class="container">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded">
			<div class="card-body p-5 text-center">
			  <form action="#" method="POST" class="mb-md-5 mt-md-4 pb-5">
                <h2 class="text-white-50 mb-5">Add a new model</h2>

                <div class="form-outline form-white mb-4">
                    <input type="text" id="nome" name="nome" placeholder="nome" class="form-control form-control-lg" required/>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="number" step="0.01" id="scala" name="scala" placeholder="scala" class="form-control form-control-lg" required/>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="text" id="body_type" name="body_type" placeholder="body type" class="form-control form-control-lg" required/>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="text" id="electronics" name="electronics" placeholder="electronics" class="form-control form-control-lg" required/>
                </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">aggiungi</button>

			  </form>

              <div>				
				<a href="seller_profile.php" class="text-white-50 fw-bold">Torna alla pagina del venditore</a>
			  </div>

            </div>
		  </div>
		</div>
	  </div>
	</div>
</section>
