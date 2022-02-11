<div class="row">
    <div class="col-md-3"></div>
    <div class="col-12 col-md-6 bg-dark bg-opacity-50 border border-dark border-2 rounded-3">
        <form class="row" action="#" method="POST" enctype="multipart/form-data">
            <h1 class="mb-3 text-light">Manage product</h1>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="series" class="form-label text-light">Series</label>
                </div>
                <div class="col-sm-4">
                    <select class="form-select" id="series" name="series" required>
                        <?php foreach($params["models"] as $data): ?>
                            <option value="<?php echo $data["codice"]; ?>"><?php echo $data["nome"]; ?></option>
                        <?php endforeach; ?>        
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="front-photo" class="form-label text-light">Front photo</label>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="front-photo" name="front-photo" class="form-control m-2 text-dark" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="side-photo" class="form-label text-light">Side photo</label>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="side-photo" name="side-photo" class="form-control m-2 text-dark" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="back-photo" class="form-label text-light">Back photo</label>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="back-photo" name="back-photo" class="form-control m-2 text-dark" required>
                </div>
            </div>       

            <h2 class="mt-3 text-light" text-light>Specifications</h2>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="strings" class="form-label text-light">Number of strings</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" name="number-strings" id="strings" class="form-control m-2" min="4" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="price" class="form-label text-light">Price</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" name="price" id="price" class="form-control m-2" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="body-material" class="form-label text-light">Body material</label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" name="body-material" id="body-material" list="body-list" required>
                    <datalist id="body-list">
                        <?php if(is_set_and_not_empty($params["materials"])): ?>
                            <?php foreach($params["materials"] as $material): ?>
                            <option value="<?php echo $material; ?>"><?php echo $material; ?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </datalist>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="color" class="form-label text-light">Color</label>
                </div>
                <div class="col-sm-4">
                 <input class="form-control" name="color" id="color" list="color-list" required>
                    <datalist id="color-list">
                        <?php if(is_set_and_not_empty($params["colors"])): ?>
                            <?php foreach($params["colors"] as $color): ?>
                                <option value="<?php echo $color;?>"><?php echo $color;?></option>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </datalist>
                </div>
            </div>   
            
            <input type="submit" class="form-control" value="Insert article"></input>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
