<div class="row">
    <div class="col-md-3"></div>
    <div class="col-12 col-md-6">
        
        <div class="row mt-5">
            <h1 class="text-light d-flex justify-content-center">Benvenuto <?php echo $_SESSION["name"];?></h1>
            <h4 class="text-light d-flex justify-content-center">Email: <?php echo $_SESSION["email"];?></h4>
        </div>

        <div class="container  mb-5">
            <div class="row">
                <div class="col">


                        <div class="card hover-card user_profile_card">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/message-icon.png" class="img-fluid m-3" />
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h5 class="align-self-center">Notifiche</h5>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#collapseNotifications" role="button" aria-expanded="false" aria-controls="collapseNotifications"></a>
                            </div>
                            <div class="row collapse justify-content-center mb-3" id="collapseNotifications">
                                <div class="toast show">
                                    <div class="toast-header mt-3">
                                        Notifica 2
                                    </div>
                                    <div class="toast-body">
                                        Ordine arrivato!s
                                    </div>
                                    <div class="toast-header mt-3">
                                        Notifica 1
                                    </div>
                                    <div class="toast-body">
                                        Ordine spedito!
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card hover-card mt-3 user_profile_card">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/orders-logo.png" class="img-fluid m-3" />
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h5 class="align-self-center">Ordini</h5>
                                </div>
                                <a href="orders.php" class="stretched-link"></a>
                            </div>
                        </div>                                   


                        <div class="card hover-card mt-3 ">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/cart-icon.png" class="img-fluid m-3" />
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h5 class="align-self-center">Carrello</h5>
                                </div>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>


                        <div class="card hover-card mt-3 user_profile_card">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/logout.png" class="img-fluid m-3" />
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h5 class="align-self-center">LOGOUT</h5>
                                </div>
                                <a href="login.php" class="stretched-link"></a>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-3"></div>
</div>
