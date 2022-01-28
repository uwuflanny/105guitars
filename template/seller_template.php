<div class="container-fluid">
    <div class="row p-4">
        <div class="col-md-3"></div>
        <div class="col-12 col-md-6 bg-dark bg-opacity-50 border border-dark border-2 rounded-2 p-4">
            <div class="row">

                <ul class="nav nav-pills seller-nav-pad" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="add" aria-selected="true">Aggiungi prodotto</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="products-tab"   data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">Prodotti</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="all-tab"        data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="false">Ordini (tutti)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="prep-tab"       data-bs-toggle="tab" data-bs-target="#prep" type="button" role="tab" aria-controls="prep" aria-selected="false">Ordini (da preparare)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="send-tab"       data-bs-toggle="tab" data-bs-target="#send" type="button" role="tab" aria-controls="send" aria-selected="false">Ordini (da spedire)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sent-tab"       data-bs-toggle="tab" data-bs-target="#sent" type="button" role="tab" aria-controls="sent" aria-selected="false">Ordini (consegnati)</button>
                    </li>
                </ul>

<br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-white" id="add" role="tabpanel" aria-labelledby="add-tab">
                        qui ci va la roba che ha fatto braso
                    </div>

                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                        <?php foreach($params["models"] as $model): ?>
                        <div class="row">
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center"> <?php echo $model["nome"]; ?> </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center"> <?php echo $model["scala"]; ?> </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center"> <?php echo $model["tipo_body"]; ?> </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center"> <?php echo $model["elettronica"]; ?> </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <?php echo $the_db->getNumberOfCopies($model["codice"]); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="tab-pane fade text-white" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://s3.amazonaws.com/media.thecrimson.com/photos/2020/11/06/010534_1346719.gif" class="img-fluid" alt="Phone">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0">Samsung Galaxy</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Comprato da: Intruder</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary">Modifica stato</button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade text-white" id="prep" role="tabpanel" aria-labelledby="prep-tab">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://s3.amazonaws.com/media.thecrimson.com/photos/2020/11/06/010534_1346719.gif" class="img-fluid" alt="Phone">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0">Samsung Galaxy</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Comprato da: Intruder</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Stato: non consegnato</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary">Modifica stato</button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade text-white" id="send" role="tabpanel" aria-labelledby="send-tab">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://s3.amazonaws.com/media.thecrimson.com/photos/2020/11/06/010534_1346719.gif" class="img-fluid" alt="Phone">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0">Samsung Galaxy</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Comprato da: Intruder</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Stato: in spedizione</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary">Modifica stato</button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade text-white" id="sent" role="tabpanel" aria-labelledby="sent-tab">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://s3.amazonaws.com/media.thecrimson.com/photos/2020/11/06/010534_1346719.gif" class="img-fluid" alt="Phone">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0">Samsung Galaxy</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Comprato da: Intruder</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">Stato: consegnato</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary">Modifica stato</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
