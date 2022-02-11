<div class="container-fluid">
    <div class="row p-4">
        <div class="col-md-2"></div>
        <div class="col-12 col-md-8 bg-dark bg-opacity-50 border border-dark border-2 rounded-2 p-4">
            <div class="row">
                <ul class="nav nav-pills seller-nav-pad" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="products-tab"   data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">Models</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="all-tab"        data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="false">Orders (all)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="prep-tab"       data-bs-toggle="tab" data-bs-target="#prep" type="button" role="tab" aria-controls="prep" aria-selected="false">Orders (to prepare)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="send-tab"       data-bs-toggle="tab" data-bs-target="#send" type="button" role="tab" aria-controls="send" aria-selected="false">Orders (to send)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="sent-tab"       data-bs-toggle="tab" data-bs-target="#sent" type="button" role="tab" aria-controls="sent" aria-selected="false">Orders (sent)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="delivered-tab"  data-bs-toggle="tab" data-bs-target="#delivered" type="button" role="tab" aria-controls="sent" aria-selected="false">Orders (delivered)</button>
                    </li>
                </ul>

                <br>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Copies</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($params["models"] as $model): ?>
                                <tr>
                                    <td class="fw-bold"><?php echo $model["nome"]; ?></td>
                                    <td><?php echo $the_db->getNumberOfCopies($model["codice"]); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="add_model.php"      class="btn btn-primary m-2" role="button">Add model</a>
                        <a href="manage_product.php" class="btn btn-primary m-2" role="button">Add copy</a>
                    </div>

                    <?php foreach ($orders as $key => $order_type): ?>
                    <div class="tab-pane fade text-white" id="<?php echo $key;?>" role="tabpanel" aria-labelledby="all-tab">
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Buyer</th>
                                </tr>
                            </thead>
                            <tbody id="<?php echo $key . "-body"; ?>">
                                <?php
                                    foreach($order_type as $order):
                                        $collapse_id = "collapse_" . $key . "_" . $order["codice_ordine"];
                                        $order_class = "order-" . $key . "-" . $order["codice_ordine"];
                                ?>
                                <tr class="<?php echo $order_class; ?>" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id ?>" aria-controls="<?php echo $collapse_id ?>" aria-expanded="false">
                                    <th> <?php echo $order["data_ordine"]; ?> </th>
                                    <th> <?php echo $order["email"]; ?> </th>
                                </tr>

                                <tr class="<?php echo $order_class; ?> collapse" id="<?php echo $collapse_id?>">
                                    <td colspan="3">
                                    <table class="table text-white mb-0 table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Photo</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($params["order_" . $order["codice_ordine"]] as $copy): ?>
                                                <tr>
                                                    <td><?php echo $copy["seriale"]; ?></td>
                                                    <td><img src="<?php echo "./images/products/".$copy["side_image"] ?>" class="img-fluid img_seller" alt="guitar"></td>
                                                    <td><?php echo $copy["prezzo"]; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="<?php echo $order_class . " " . $order_class . "-btn" ?> collapse" id="<?php echo $collapse_id?>">
                                    <?php if ($key != "all" && $key != "delivered") { ?>
                                        <td colspan="2">
                                            <button value="<?php echo $key . "," . $order["codice_ordine"] ?>"
                                                    class="btn btn-primary btn-order" type="button">
                                                Sposta in "<?php echo orderButtonMessage($key) ?>"
                                            </button>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <br>

            <div class="d-flex mb-3">
                <a href="notification_page.php" class="btn btn-secondary m-2"      role="button">Notifications</a>
                <a href="login.php"             class="btn btn-danger m-2 ms-auto" role="button">Logout</a>
            </div>
        </div>
    </div>
</div>
