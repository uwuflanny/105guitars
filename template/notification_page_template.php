<section>
	<div class="container">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		  <div class="card bg-dark text-white rounded">
			<div class="card-body p-5 text-center">

                <?php foreach(array_reverse($params["notifications"]) as $notif): ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><?php echo $notif["titolo"] ?></h4>
                        <p><?php echo nl2br($notif["descrizione"]); ?></p>
                        <hr>
                        <p class="mb-0">Data: <?php echo $notif["invio"] ?></p>
                    </div>          
                <?php endforeach; ?>
                
            </div>
		  </div>
		</div>
	  </div>
	</div>
</section>
