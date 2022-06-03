<?php 
   include('includes/dbconnection.php');
   session_start();
   error_reporting(0);
   include('includes/dbconnection.php');
   if(isset($_POST['submit']))
     {
   
       $name=$_POST['name'];
       $email=$_POST['email'];
       $services=$_POST['services'];
       $adate=$_POST['adate'];
       $atime=$_POST['atime'];
       $phone=$_POST['phone'];
       $aptnumber = mt_rand(100000000, 999999999);
     
       $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
       if ($query) {
   $ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
   $result=mysqli_fetch_array($ret);
   $_SESSION['aptno']=$result['AptNumber'];
    echo "<script>window.location.href='thank-you.php'</script>";	
     }
     else
       {
         $msg="Algo salió mal. Inténtalo de nuevo";
       }
   }
   ?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="css/jquery.timepicker.css">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>BarberShop</title>
   </head>
   <body class="mb-auto h-100 text-center text-white bg-dark">
      <header class="site-header sticky-top py-1 mb-auto">
         <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="index.php" aria-label="Product">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24">
                  <title>Product</title>
                  <circle cx="12" cy="12" r="10"/>
                  <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
               </svg>
            </a>
            <a class="py-2 d-none d-md-inline-block" href="servicios.php">Servicios</a>
            <a class="py-2 d-none d-md-inline-block" href="productos.php">Productos</a>
            <a class="py-2 d-none d-md-inline-block" href="galeria.php">Galería</a>
            <a class="py-2 d-none d-md-inline-block" href="reserva.php">Reserva</a>
            <a class="py-2 d-none d-md-inline-block" href="admin/index.php">Login</a>
         </nav>
      </header>
      <!-- Section: Design Block -->
      <section class="text-center">
         <!-- Background image -->
         <div
            class="p-5 bg-image"
            style="
            background-image: url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');
            height: 300px;
            "
            ></div>
         <!-- Background image -->
         <div
            class="card mx-4 mx-md-5 shadow-5-strong"
            style="
            margin-top: -100px;
            backdrop-filter: blur(30px);
            "
            >
            <div id="formReserva" class="card-body px-md-5">
               <section class="ftco-section ftco-no-pt ftco-booking">
                  <div class="container-fluid px-0">
                     <div class="row no-gutters d-md-flex justify-content-end">
                        <div class="one-forth d-flex align-items-end">
                           <div class="text">
                              <div class="overlay"></div>
                              <div class="appointment-wrap">
                                 <span class="subheading">Reservaciones</span>
                                 <h3 class="mb-2">Haga una cita</h3>
                                 <form action="#" method="post" class="appointment-form">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                                          </div>
                                          <br>
                                       </div>
                                       <br>
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <input type="email" class="form-control" id="appointment_email" placeholder="Correo" name="email" required>
                                          </div>
                                          <br>
                                       </div>
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="services" id="services" required class="form-control">
                                                   <option value="">Selecciona Nuestros Servicios</option>
                                                   <?php $query=mysqli_query($con,"select * from tblservices");
                                                      while($row=mysqli_fetch_array($query))
                                                      {
                                                      ?>
                                                   <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
                                                   <?php } ?> 
                                                </select>
                                             </div>
                                             <br>
                                          </div>
                                       </div>
                                       <br>
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <input type="date" class="form-control appointment_date" name="adate" id='adate' required>
                                          </div>
                                          <br>
                                       </div>
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <input type="time" value="09:00" class="form-control appointment_time" name="atime" id='atime' required>
                                          </div>
                                          <br>
                                       </div>
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" required maxlength="10" pattern="[0-9]+">
                                          </div>
                                          <br>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <input type="submit" name="submit" value="HAZ UNA CITA" class="btn btn-primary" href="/docs/cita.php">
                                    </div> 
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="one-third">
                           <div class="img" style="background-image: url(images/bg-1.jpg);">
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </section>
      <footer class="footer mt-auto py-3">
         <div class="row d-flex flex-column flex-md-row justify-content-between"  >
            <div class="col-5"  id="pCenter2" >
               <nav>
                  <h5> BarberShop La Escondida </h5>
                  <ul>
                     <li> 
                        <i class="fas fa-phone"></i>
                        (+52) 461 410 3391 
                     </li>
                     <li>
                        <i class="fas fa-envelope"></i>
                        laescondidabarbershop 
                     </li>
                     <li>
                        <i class="fas fa-map-pin"></i>
                        Camino de la Ermita 135B, El Campanario, Celaya, Gto
                     </li>
                  </ul>
               </nav>
            </div>
            <div class="col">
               <nav>
                  <h5>Redes Sociales</h5>
                  <ul id="navlist">
                     <li id="iconoFb" > <a href="https://www.facebook.com/Barber%C3%ADa-y-Peluquer%C3%ADa-La-Escondida-330374411044356 "> </a> </li>
                     <li id="iconoIn" > <a href="https://www.instagram.com/barberia.la.escondida/"> </a> </li>
                  </ul>
               </nav>
            </div>
         </div>
      </footer>
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="../../assets/js/vendor/holder.min.js"></script>
      <script>
         Holder.addTheme('thumb', {
           bg: '#55595c',
           fg: '#eceeef',
           text: 'Thumbnail'
         });
      </script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/jquery.timepicker.min.js"></script>
   </body>
</html>