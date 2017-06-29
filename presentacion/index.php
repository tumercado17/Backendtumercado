<?php
session_start();
$_SESSION["PHPSESSID"]=session_id();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <title>Idex-Tumercado-</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <meta name="description" content="" />
 <meta name="author" content="http://webthemez.com" />
 <!-- css -->
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
 <link href="assets/css/fancybox/jquery.fancybox.css" rel="stylesheet">
 <link href="assets/css/flexslider.css" rel="stylesheet" />
 <link href="assets/css/style.css" rel="stylesheet" />

 </head>
 <body>
 <div id="wrapper">

 	<section id="inner-headline">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12">
 				<h2 class="pageTitle">Bienvenidos -TuMercado.com Backend-</h2>
 			</div>
 		</div>
 	</div>
 	</section>

 	<section id="content">

 	<div class="container">

 	<div class="row">
 			<div class="col-md-6">
 		    <form action="../logica/procesarlogin.php" method="POST">

         	 <div class="control-group">
             <div class="controls">
               Nombre de usuario:
                  <input type="text" id="nombre" name="nombre" class="form-control" required="required" placeholder="Nombre">
 			              <p class="help-block"></p>
 		          </div>
 	         </div>

           <div class="control-group">
             <div class="controls">
               Contraseña:
                  <input type="Password" id="contrasena" name="contrasena" class="form-control" required="required" placeholder="Password">
                    <p class="help-block"></p>
              </div>
           </div>

 	     <div id="success"> </div>
 	          <button type="submit" class="btn btn-primary pull-right">Ingresar</button><br />
           </form>
 								</div>
					</div>
 	</div>

 	</section>
 	</div>

 <script src="assets/js/jquery.js"></script>
 <script src="assets/js/jquery.easing.1.3.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="assets/js/jquery.fancybox.pack.js"></script>
 <script src="assets/js/jquery.fancybox-media.js"></script>
 <script src="assets/js/jquery.flexslider.js"></script>
 <script src="assets/js/animate.js"></script>
 <!-- Vendor Scripts -->
 <script src="assets/js/modernizr.custom.js"></script>
 <script src="assets/js/jquery.isotope.min.js"></script>
 <script src="assets/js/jquery.magnific-popup.min.js"></script>
 <script src="assets/js/animate.js"></script>
 <script src="assets/js/custom.js"></script>

 </body>
 </html>
