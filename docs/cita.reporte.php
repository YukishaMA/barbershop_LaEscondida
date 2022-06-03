<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/main.css">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>BarberShop GRACIAS</title>
    </head>

    <body class="mb-auto h-100 text-center text-white bg-dark">
    <div class="contentT">
		<table id="tableS">
          <tbody>
            <tr>
              <td id="colL"></td>
              <td id="colR">
                <p>Fecha de creación: <?php echo $atime ?> </p>

                <h1 class="titleT" > GRACIAS </h1>
                <h2 class="titleT" > <?php echo $nombre;?> </h2>

                <div class="col-md-12 ">
                  <h4 id="ty" class="w3ls_head">Su número de cita es: <?php echo $_SESSION['aptno'];?> </h4>

                  <br><br>

                  <p id="ty" class="w3ls_head">Fecha de cita: <?php echo $adate;?> </p>
                  <p id="ty" class="w3ls_head">Servicio: <?php echo $services;?> </p>

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



      
