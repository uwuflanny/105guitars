<section>
	<div class="container">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded-3">
			<div class="card-body p-5 text-center">
			  <form action="#" method="POST" class="mb-md-5 mt-md-4 pb-5">
          <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
          <p class="text-white-50 mb-5">Please enter your email and password!</p>

          <?php if(isset($_GET["result"]) && !empty($_GET["result"])): ?>
              <p class="text-red-50">
                <?php switch($_GET["result"]){
                  case 1:
                    echo "Incorrect parameters";
                    break;
                  case 2:
                    echo "Please log in";
                    break;
                  case 3:
                    echo "Please log in as administrator";
                    break;
                } ?>           
              </p>
          <?php endif;?>

          <div class="form-outline form-white mb-4">
            <label for="email" class="d-none">email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="form-control form-control-lg" required/>
          </div>
          <div class="form-outline form-white mb-4">
            <label for="password" class="d-none">password</label>
            <input type="password" id="password" name="password" placeholder="Password" class="form-control form-control-lg" required/>
          </div>
          <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="forgot_password.php">Forgot password?</a></p>
          <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
			  </form>
			  <div>
          <p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a></p>
			  </div>

        </div>
		  </div>
		</div>
	  </div>
	</div>
</section>
