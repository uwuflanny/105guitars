<div class="row">
    <div class="col-md-3"></div>
    <div class="col-12 col-md-6 bg-dark bg-opacity-50 border border-dark border-2 rounded-3">
        <form class="row" action="#">
            <h1 class="mb-3 text-light">Manage product</h1>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="model-name" class="form-label text-light">Model name</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="model-name" name="model-name" class="form-control m-2">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="model-code" class="form-label text-light">Model code</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="model-code" name="model-code" class="form-control m-2">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="front-photo" class="form-label text-light">Front photo</label>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="front-photo" name="front-photo" class="form-control m-2 text-dark">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="lateral-photo" class="form-label text-light">Lateral photo</label>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="lateral-photo" name="lateral-photo" class="form-control m-2 text-dark">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="vertical-photo" class="form-label text-light">Vertical photo</label>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="vertical-photo" name="vertical-photo" class="form-control m-2 text-dark">
                </div>
            </div>

            <h2 class="mt-3 text-light" text-light>Specifications</h2>
            <div class="row">
                <div class="col-sm-2">
                    <label class="form-label text-light">Scale</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control m-2" min="4">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-2">
                    <label class="form-label text-light">Number of strings</label>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control m-2" min="4">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-2">
                    <label class="form-label text-light">Body material</label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" name="bodyType" list="bodyOptions">
                    <datalist id="bodyOptions">
                        <option value="alder">Alder</option>
                        <option value="pino">Pino</option>
                    </datalist>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label class="form-label text-light">Electronics</label>
                </div>
            </div>
            
            <input type="submit" class="form-control" value="Insert article"></input>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
