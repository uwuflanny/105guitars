<section>
	<div class="container">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded">
			<div class="card-body p-5 text-center">
			  <form action="#" method="POST" class="mb-md-5 mt-md-4 pb-5" enctype="multipart/form-data">
                <h2 class="text-white-50 mb-5">Add a new product</h2>

                <div class="form-outline form-white mb-4">
                    
                  <label for="series">Model:</label>
                  <select class="form-select" id="series" name="series" required>
                        <?php foreach($params["models"] as $data): ?>
                            <option value="<?php echo $data["codice"]; ?>"><?php echo $data["nome"]; ?></option>
                        <?php endforeach; ?>        
                    </select>
                </div>

                <div class="form-outline form-white mb-4 d-flex justify-content-center" >
                  <label for="front-photo">Front photo:</label>
                  <input type="file" id="front-photo" name="front-photo" class="form-control m-2 text-dark" required>
                </div>

                <div class="form-outline form-white mb-4 d-flex justify-content-center" >
                  <label for="side-photo">Side photo:</label>
                  <input type="file" id="side-photo" name="side-photo" class="form-control m-2 text-dark" required>
                </div>

                <div class="form-outline form-white mb-4 d-flex justify-content-center" >
                  <label for="back-photo">Back photo:</label>
                  <input type="file" id="back-photo" name="back-photo" class="form-control m-2 text-dark" required>
                </div>

                <h2 class="mt-3 text-light" text-light>Specifications</h2>



                <div class="form-outline form-white mb-4">
                    <label for="number-strings" class="d-none">Strings</label>
                    <input class="form-control form-control-lg" placeholder="string number" type="number" placeholder="string number" name="number-strings" id="strings" min="4" required>
                </div>

                <div class="form-outline form-white mb-4">
                    <label for="body-material" class="d-none">Body Material</label>
                    <input class="form-control form-control-lg" name="body-material" placeholder="body material" id="body-material" list="body-list" required>
                    <datalist id="body-list">
                        <?php if(is_set_and_not_empty($params["materials"])): ?>
                            <?php foreach($params["materials"] as $material): ?>
                            <option value="<?php echo $material; ?>"><?php echo $material; ?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </datalist>
                </div>

                <div class="form-outline form-white mb-4">
                    <label for="color" class="d-none">Color</label>
                    <input class="form-control form-control-lg" name="color" placeholder="color" id="color" list="color-list" required>
                    <datalist id="color-list">
                        <?php if(is_set_and_not_empty($params["colors"])): ?>
                            <?php foreach($params["colors"] as $color): ?>
                                <option value="<?php echo $color;?>"><?php echo $color;?></option>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </datalist>
                </div>

                <div class="form-outline form-white mb-4">
                    <label for="price" class="d-none">Price</label>
                    <input class="form-control form-control-lg" type="number" placeholder="price" name="price" id="price" min="4" required>
                </div>

                <button class="btn btn-outline-light btn-lg px-5 form-control" type="submit" value="Insert article">aggiungi</button>

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

