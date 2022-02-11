<div class="row p-4 text-light"> 
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
        </header>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">                         
                        <img id="large-image" src="<?php echo "./images/products/".$params["side_image"] ?>" alt="zoomed image" class="img-fluid mt-5"/> 
                    </div>
                </div>
             
                <div class="row m-4">
                    <div class="col-12">
                        <div class="d-flex flex-row-reverse">

                        <?php
                            if(!is_set_and_not_empty($_SESSION["isadmin"]) || !$_SESSION["isadmin"]){ ?>
                             <button type="button" id="btnProduct" value="<?php echo $params["serial"]; ?>" class="btn btn-success btn-lg m-2">Add to cart</button>  
                            
                        <?php } ?>
                         
                            <em class="fs-4 m-3"><strong>Price <?php echo $params["price"] ?>$</strong></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <section class="row mt-5">
            <div class="col-12 col-md-5">
                <img src="<?php echo "./images/products/".$params["front_image"] ?>" alt="front image" class="img-fluid"/>
            </div>
            <div class="col-12 col-md-7 mt-4">
                <h3>Specifications:</h3>
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
