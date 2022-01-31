<section class="vh-100 gradient-custom">
	<div class="container py-5 h-100">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white" style="border-radius: 1rem;">
			<div class="card-body p-5 text-center">

			  <form action="#" method="POST" class="mb-md-5 mt-md-4 pb-5">

				<h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
				<br>
				<?php if(isset($_GET["result"]) && !empty($_GET["result"])): ?>
					<p class="text-red-50">Email already exists!</p>
				<?php endif;?>

				<div class="form-outline form-white mb-4">
				  <input type="email" id="typeEmailX" name="email" placeholder="Email" class="form-control form-control-lg" />
				</div>

				<div class="form-outline form-white mb-4">
				  <input type="password" id="typePasswordX" name="password" placeholder="Password" class="form-control form-control-lg" />
				</div>

				<div class="form-outline form-white mb-4">
				  <input type="text" id="typename" name="name" placeholder="Name" class="form-control form-control-lg" />
				</div>

				<div class="form-outline form-white mb-4">
				  <input type="text" id="typesurname" name="surname" placeholder="Surname" class="form-control form-control-lg" />
				</div>

				<p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

				<button class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>


			  </form>

			  <div>
				
				<p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Log in</a></p>
			  </div>

			</div>
		  </div>
		</div>
	  </div>
	</div>
</section>
