<div class="row">
    <div class="col-md-3"></div>
    <div class="col-12 col-md-6">
        
        <div class="row mt-5">
            <h1 class="text-light d-flex justify-content-center">Benvenuto <?php echo $_SESSION["name"];?></h1>
            <h2 class="text-light d-flex justify-content-center">Email: <?php echo $_SESSION["email"];?></h2>
        </div>

        <div class="container  mb-5">
            <div class="row">
                <div class="col">


                        <div class="card hover-card mt-3 user_profile_card">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/message-icon.png" class="img-fluid m-3" alt="Notifications"/>
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h3 class="align-self-center">Notifications</h3>
                                </div>
                                <a href="notification_page.php" class="stretched-link" title="Notifications"></a>
                            </div>
                        </div> 


                        <div class="card hover-card mt-3 user_profile_card">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/orders-logo.png" class="img-fluid m-3" alt="Orders"/>
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h3 class="align-self-center">Orders</h3>
                                </div>
                                <a href="orders.php" class="stretched-link" title="Orders"></a>
                            </div>
                        </div>                                   


                        <div class="card hover-card mt-3 ">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/cart-icon.png" class="img-fluid m-3" alt="Cart"/>
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h3 class="align-self-center">Cart</h3>
                                </div>
                                <a href="cart.php" class="stretched-link" title="Cart"></a>
                            </div>
                        </div>


                        <div class="card hover-card mt-3 user_profile_card">
                            <div class="row"> 
                                <div class="col-3">
                                    <img src="images/icons/logout.png" class="img-fluid m-3" alt="LOGOUT"/>
                                </div>
                                <div class="col-8 d-flex justify-content-start">
                                    <h3 class="align-self-center">LOGOUT</h3>
                                </div>
                                <a href="login.php" class="stretched-link" title="LOGOUT"></a>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-3"></div>
</div>
