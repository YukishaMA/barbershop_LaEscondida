<?php
   session_start();
   error_reporting(0);
   include('includes/dbconnection.php');
   
   if(isset($_POST['login']))
     {
       $adminuser=$_POST['username'];
       $password=md5($_POST['password']);
       $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
       $ret=mysqli_fetch_array($query);
       if($ret>0){
         $_SESSION['bpmsaid']=$ret['ID'];
        header('location:dashboard.php');
       }
       else{
       $msg="Información Inválida.";
       }
     }
     ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/main.css">

      <title>LA ESCONDIDA | Admin </title>
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

   </head>
   <body>
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
               background: hsla(0, 0%, 100%, 0.8);
               backdrop-filter: blur(30px);
               "
               >
               <div id="formAdmin" class="card-body py-5 px-md-5">
                  <div class="row d-flex justify-content-center">
                     <div class="col-lg-12">
                        <h3 class="form-outline">Página de Acceso Admin</h3>
                        <div class="widget-shadow">
                           <div class="login-top">
                              <h5 class="subheading" >Bienvenid@ a tu Sistema Administrativo! </h5>
                           </div>
                           <div class="login-body">
                              <form role="form" method="post">
                                 <p style="font-size:16px; color:red"> <?php if($msg){
                                    echo $msg;
                                    }  ?> </p>
                                 <input type="text" class="user" name="username" placeholder="Usuario" required>
                                 <input type="password" name="password" class="lock" placeholder="Contraseña" required>
                                 <input type="submit" name="login" value="Acceder">
                                 
								 
								 <div class="forgot-grid">
                                    <div class="forgot">
									<br>
                                       <a href="../index.php">Volver al Inicio</a>
                                    </div>
                                    <div class="clearfix"> </div>
                                 </div>
                                 <div class="forgot-grid">
                                    <div class="forgot">
                                      <a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="clearfix"> </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		</section>
      <!-- Classie -->
      <script src="js/classie.js"></script>
      <script>
         var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
         	showLeftPush = document.getElementById( 'showLeftPush' ),
         	body = document.body;
         	
         showLeftPush.onclick = function() {
         	classie.toggle( this, 'active' );
         	classie.toggle( body, 'cbp-spmenu-push-toright' );
         	classie.toggle( menuLeft, 'cbp-spmenu-open' );
         	disableOther( 'showLeftPush' );
         };
         
         function disableOther( button ) {
         	if( button !== 'showLeftPush' ) {
         		classie.toggle( showLeftPush, 'disabled' );
         	}
         }
      </script>
      <!--scrolling js-->
      <script src="js/jquery.nicescroll.js"></script>
      <script src="js/scripts.js"></script>
      <!--//scrolling js-->
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.js"> </script>
   </body>
</html>