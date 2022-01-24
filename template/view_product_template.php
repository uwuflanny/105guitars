<div class="row p-4"> 
    <div class="col-md-2 col-lg-3"></div>
    <article class="col-12 col-md-8 col-lg-6 bg-dark bg-opacity-50 border border-dark border-2 rounded-2 p-4">
        <header>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-12 col-md-10">
                    <!-- <h2>T1.6D - Aged Natural Matte / Distressed</h2> -->
                    <h2><?php echo $params["productName"]." - ".$params["color"]; ?></h2>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <em>"Created with the most demanding six-string guitarists in mind, this premium feature-loaded guitar belongs to the Solar Type T1 top of the line range, offering outstanding elegance and performance."</em>
                </div>
            </div>
        </header>
        <div class="row mt-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">                         
                        <img id="large-image" src="<?php echo "./images/products/".$params["side_image"] ?>" alt="" class="img-fluid mt-5"/> 
                    </div>
                </div>

                <div id="thumbnail-container" class="row d-flex justify-content-center mt-3">
                    <img src="<?php echo "./images/products/".$params["side_image"] ?>" alt="" class="card img-thumbnail bg-dark m-2 img-gallery" />
                    <img src="<?php echo "./images/products/".$params["back_image"] ?>" alt="" class="card img-thumbnail bg-dark m-2 img-gallery" />
                </div>

                <div class="row m-4">
                    <div class="col-12">
                        <div class="d-flex flex-row-reverse">
                            <button type="button" class="btn btn-success btn-lg m-2">Add to cart</button>   
                            <em class="fs-4 m-3"><strong>Price <?php echo $params["price"] ?>$</strong></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <section class="row m-5">
            <div class="col-12 col-md-6">
                <img src="<?php echo "./images/products/".$params["front_image"] ?>" alt="" class="img-fluid"/>
            </div>
            <div class="col-12 col-md-6">
                <h3>Specifications</h3>
                <table class="table table-borderless align-middle table-md">
                    <?php foreach($params["product_info"] as $data => $data_value): ?>
                    <tr class="text-light">
                        <th><?php echo $data; ?></th>
                        <td><?php echo $data_value; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>

    </article>
    <div class="col-md-2 col-lg-3"></div>
</div>
