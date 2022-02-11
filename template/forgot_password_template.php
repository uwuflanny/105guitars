<section>
	<div class="container">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded-3">
				<div class="card-body p-5 text-center">
					<form action="#" method="POST" class="mb-md-5 mt-md-4 pb-5">
						<h2 class="fw-bold mb-2 text-uppercase">I forgor &#128128;</h2>
                                                <p class="text-white-50 mb-5"><?php echo $params["message"]; ?></p>
						<div class="form-outline form-white mb-4">
							<label for="email" class="d-none">email</label>
							<input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" required/>
						</div>
						<button class="btn btn-outline-light btn-lg px-5" type="submit">Reset password</button>
					</form>
        		</div>
		  	</div>
		</div>
	  </div>
	</div>
</section>
