<?php
session_start();
error_reporting(0);

  ?>
  
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BarberShop GRACIAS</title>
    </head>

    <body class="mb-auto h-100 text-center text-white bg-dark">
      <header class="site-header sticky-top py-1 mb-auto">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
          <a class="py-2" href="index.php" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
          </a>
          <a class="py-2 d-none d-md-inline-block" href="servicios.php">Servicios</a>
            <a class="py-2 d-none d-md-inline-block" href="productos.php">Productos</a>
            <a class="py-2 d-none d-md-inline-block" href="galeria.php">Galería</a>
            <a class="py-2 d-none d-md-inline-block" href="reserva.php">Reserva</a>
            <a class="py-2 d-none d-md-inline-block" href="admin/index.php">Login</a>
        </nav>
      </header>

    <div class="contentT">
		<table id="tableS">
          <tbody>
            <tr>
              <td id="colL"></td>
              <td id="colR">
                <h1 class="titleT" > GRACIAS </h2>
                <div class="col-md-12 ">
                  <h4 id="ty" class="w3ls_head">Gracias por aplicar, su número de cita es: <br> <br> <?php echo $_SESSION['aptno'];?> </h4>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
	</div>
      
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

      
    </body>


</html> 



      
