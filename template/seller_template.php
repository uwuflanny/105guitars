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
                        <button class="nav-link" id="products-tab"   data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">Modelli</button>
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
                        <a href="manage_product.php">add a product here</a>
                    </div>

                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                        <table class="table text-white">
                            <thead>
                                <th scope="col">Nome</th>
                                <th scope="col">Scala</th>
                                <th scope="col">Tipo body</th>
                                <th scope="col">Elettronica</th>
                                <th scope="col">Numero copie</th>
                            </thead>
                            <tbody>
                                <?php foreach($params["models"] as $model): ?>
                                <tr>
                                    <th scope="row"><?php echo $model["nome"]; ?></th>
                                    <td>            <?php echo $model["scala"]; ?></td>
                                    <td>            <?php echo $model["tipo_body"]; ?></td>
                                    <td>            <?php echo $model["elettronica"]; ?></td>
                                    <td>            <?php echo $the_db->getNumberOfCopies($model["codice"]); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php foreach ($orders as $key => $order_type): ?>
                    <div class="tab-pane fade text-white" id="<?php echo $key;?>" role="tabpanel" aria-labelledby="all-tab">
                        <table class="table text-white">
                            <thead>
                                <th scope="col">Data</th>
                                <th scope="col">Da</th>
                            </thead>
                            <tbody>
                                <?php foreach($order_type as $order): ?>
                                <tr>
                                    <th scope="row"><?php echo $order["data_ordine"]; ?></th>
                                    <td>            <?php echo $order["nome"].' '; echo $order["cognome"]; ?></td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            Mostra prodotti
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table class="table text-white mb-0 collapse" id="collapseExample">
                                            <thead>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Scala</th>
                                                <th scope="col">Numero di corde</th>
                                                <th scope="col">Colore</th>
                                                <th scope="col">Materiale</th>
                                                <th scope="col">Prezzo</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($params["order_" . $order["codice_ordine"]] as $copy): ?>
                                                <tr>
                                                    <td><?php echo $copy["nome"]; ?></th>
                                                    <td><?php echo $copy["scala"]; ?></th>
                                                    <td><?php echo $copy["num_corde"]; ?></th>
                                                    <td><?php echo $copy["colore"];    ?></td>
                                                    <td><?php echo $copy["material"];  ?></td>
                                                    <td><?php echo $copy["prezzo"];    ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
