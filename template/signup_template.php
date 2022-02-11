<section>
	<div class="container">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded">
			<div class="card-body p-5 text-center">

			  <form action="#" method="POST" class="mb-md-5 mt-md-4 pb-5">

				<h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
				<br>
				<?php if(isset($_GET["result"]) && !empty($_GET["result"])): ?>
					<p class="text-red-50">Email already exists!</p>
				<?php endif;?>

				<div class="form-outline form-white mb-4">
					<label for="email" class="d-none">email</label>
				  <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" required/>
				</div>

				<div class="form-outline form-white mb-4">
				<label for="password" class="d-none">password</label>
				  <input type="password" id="password" name="password" placeholder="Password" class="form-control form-control-lg" required/>
				</div>

				<div class="form-outline form-white mb-4">
				<label for="name" class="d-none">name</label>
				  <input type="text" id="name" name="name" placeholder="Name" class="form-control form-control-lg" required/>
				</div>

				<div class="form-outline form-white mb-4">
				<label for="surname" class="d-none">surname</label>
				  <input type="text" id="surname" name="surname" placeholder="Surname" class="form-control form-control-lg" required/>
				</div>

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
