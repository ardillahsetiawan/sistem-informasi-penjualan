<?php
session_start();
include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Detail Produk</title>
    <style>

   img {
     border: 4px solid #575D63;
     margin: 20px;
     padding: 8px;
   }
</style>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  </head>
  <body>

   <?php include 'menu.php'; ?>

   <div class="col-md-12 col-sm-6 col-xs-6">
   <center>
     <img src="image/ilnoise_logo.jpg" alt="" width="400px" class="img-responsive">
   </center>
   </div>
   <div class="col-md-13">
     <div class="panel panel-back noti-box">
       <center>
         <a href="image/a1.jpg" target="_blank"><img src="image/a1.jpg" width="300px"></a>
         <a href="image/a2.jpg" target="_blank"><img src="image/a2.jpg" width="300px"></a>
         <a href="image/a3.jpg" target="_blank"><img src="image/a3.jpg" width="300px"></a>
         <a href="image/a4.jpg" target="_blank"><img src="image/a4.jpg" width="300px"></a>
         <a href="image/a5.jpg" target="_blank"><img src="image/a5.jpg" width="300px"></a>
         <a href="image/a6.jpg" target="_blank"><img src="image/a6.jpg" width="300px"></a>
         <a href="image/a7.jpg" target="_blank"><img src="image/a7.jpg" width="300px"></a>
         <a href="image/a8.jpg" target="_blank"><img src="image/a8.jpg" width="300px"></a>
         <a href="image/a9.jpg" target="_blank"><img src="image/a9.jpg" width="300px"></a>

         <div class="container">
           <h1 class="display-4"><span class="font-weight-bold">ILNoise</span>
             <br>
             <h4><i>"Make Attention"</i></h4>
           </h1>
           <p class="lead">ILNoise official online store website.<br>For more information, visit our official Instagram.</p>
           <a class="btn btn-primary btn-lg font-weight-bold" href="https://www.instagram.com/il.noise/?hl=id" target='_blank' role="button">Visit Instagram</a>
         </div>

       </center>
     </div>
   </div>


  </body>
</html>
