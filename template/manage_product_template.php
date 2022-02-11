<section>
	<div class="container">
	  <div class="row d-flex justify-content-center  h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded">
			<div class="card-body p-5">
			  <form action="#" method="POST" class="pb-5" enctype="multipart/form-data">
                <h2 class="text-white-50 mb-5 text-center">Add a new product</h2>

                <div class="mb-4">
                  <label for="series" class="mb-2">Model:</label>
                  <select class="form-select" id="series" name="series" required>
                        <option value="">Choose</option>
                        <?php foreach($params["models"] as $data): ?>
                            <option value="<?php echo $data["codice"]; ?>"><?php echo $data["nome"]; ?></option>
                        <?php endforeach; ?>        
                    </select>
                </div>

                <div class="mb-4" >
                  <label for="front-photo" class="mb-2">Front photo</label>
                  <input type="file" id="front-photo" name="front-photo" class="form-control text-dark" required>
                </div>

                <div class=" mb-4" >
                  <label for="side-photo" class="mb-2">Side photo</label>
                  <input type="file" id="side-photo" name="side-photo" class="form-control text-dark" required>
                </div>

                <div class=" mb-4" >
                  <label for="back-photo" class="mb-2">Back photo</label>
                  <input type="file" id="back-photo" name="back-photo" class="form-control text-dark" required>
                </div>

                <h3 class="mt-5 mb-4 text-white-50 text-center">Product specifications</h3>

                <div class=" mb-4">
                    <label for="number-strings" class="mb-2">Strings</label>
                    <input class="form-control form-control-lg" type="number" name="number-strings" id="number-strings" min="4" required>
                </div>

                <div class=" mb-4">
                    <label for="body-material" class="mb-2">Body Material</label>
                    <input class="form-control form-control-lg" name="body-material" id="body-material" list="body-list" required>
                    <datalist id="body-list">
                        <?php if(is_set_and_not_empty($params["materials"])): ?>
                            <?php foreach($params["materials"] as $material): ?>
                            <option value="<?php echo $material; ?>"><?php echo $material; ?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </datalist>
                </div>

                <div class=" mb-4">
                    <label for="color" class="mb-2">Color</label>
                    <input class="form-control form-control-lg" name="color" id="color" list="color-list" required>
                    <datalist id="color-list">
                        <?php if(is_set_and_not_empty($params["colors"])): ?>
                            <?php foreach($params["colors"] as $color): ?>
                                <option value="<?php echo $color;?>"><?php echo $color;?></option>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </datalist>
                </div>

                <div class=" mb-4">
                    <label for="price" class="mb-2">Price</label>
                    <input class="form-control form-control-lg" type="number" name="price" id="price" min="4" required>
                </div>

                <button class="mt-5 btn btn-outline-light btn-lg px-5 form-control" type="submit" value="Insert article">Add product</button>

			  </form>

              <div>				
				<a href="seller_profile.php" class="text-white-50 fw-bold">Go back to seller page</a>
			  </div>

            </div>
		  </div>
		</div>
	  </div>
	</div>
</section>

