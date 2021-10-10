<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> <!-- iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/tab.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>


    <title>Inicio</title>
</head>
<body>
    <section class="contenedor1">
        <nav>
            <div class="logo">
                <img src="./assets/img/logo redes sociales.png" alt="">
            </div>
            <input type="checkbox" id="click" class="navegador">
            <label for="click" class="menu-btn">
              <i class="fas fa-bars"></i>
            </label>
            <ul>
                
            </li>
              <li><a href="/InicioSesionNic">Descubre Nicaragua</a></li>
              <li><a href="login.php">Afiliar mi PYME</a></li>
              <li><a href="signup.php">iniciar</a></li>
            </ul>

            <a href="https://www.instagram.com/descubre_nicaragua_app/" target="_blank"><i class="fab fa-instagram"></i></a>
          </nav>




          <?php if(!empty($user)): ?>
      <br> Bienvenido: <?= $user['email']; ?>
      <br>Estas logueado exitosamente!
      <a href="logout.php">
        Salir
      </a>
    <?php else: ?>
      <h1>Porfavor Registrate o Inicia Sesion</h1>

      <a href="login.php">Inicia</a> o
      <a href="signup.php">Registrate</a>
    <?php endif; ?>



    </section>


    <section class="ContenedorHeader">
        
      <div class="ContenedorFotoHeader">
            <div class="icono">
                <i class="fas fa-cloud"></i>
            </div>

          <div class="imagen">
              <img src="./assets/img/2733221.png" alt="">
          </div>

          <div class="box-texto">

           <div class="icono-sol">
            <i class="fas fa-sun"></i>
           </div>

           <div class="texto2">
               <h2>24 / 7</h2>
               <p>en funcionamiento</p>
           </div>

        </div>

          </div>

      <div class="ContenedorTextoHeader">
        <h1>¿Te gustaría conocer Nicaragua de forma fácil y  <span class="TextoAmarillo">divertida?</span> </h1>
        <p>Es tiempo de que disfrutes unas vacaciones y te guíes con nuestra app.</p> 
        
        <a href="#" class="BotonHeader">Disponible para todo dispositivo</a>
      </div>
      
    </section>

    <section class="Cajas">
        <div class="texto3">
            <h3>Descubre Lugares Similares a estos <span><img src="./assets/img/rainbow_1f308.png" alt=""></span></h3>

        </div>

        <div class="Caja" style="background-image: url(assets/img/volcan\ masaya.jpg);">
            <span class="Nombre1"><i class="far fa-compass"></i> Volcan Masaya</span>
        </div>

        <div class="Caja" style="background-image: url(assets/img/la\ veranera.jpg);">
            <span class="Nombre2"><i class="far fa-compass"></i>La veranera</span>
        </div>

        <div class="Caja" style="background-image: url(assets/img/Gran\ Sultana.jpg);">
        <span class="Nombre3"><i class="far fa-compass"></i>Catedral De Granada</span>
        </div>

        <div class="Caja" style="background-image: url(assets/img/corn\ island.jpg);">
            <span class="Nombre4"><i class="far fa-compass"></i>Corn Island</span>
        </div>

    </section>



    <section class="PorqueUsar">
        <div class="TextoPorqueUsar">
            <h2>Porqué usar nuestra app?</h2>
            <p>
                Nuestra proyecto es una app nunca antes presentada 
                ni presentada en el país. 
                <br><br>
               Esta cuenta con diversas funcionalidades que permite que el usuario conozca todo del país, brindándole información completa de una forma muy fácil de 
               entender.
            <br><br>
              De igual forma no sólo cuenta con información de 
              lugares, también posee información detallada de 
              hoteles, restaurantes, actividades, playas y otras 
              diversas categorías divididas por departamento.
                                                            
            </p>
        </div>


        <div class="ContenedorFoto">
            <img src="./assets/img/iPhone 13 Mockup.png" alt="">
        </div>    
    </section>
    <div class="sombra"></div>
<!-- 
<div>
    <div class="tab_container">
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1" class="tab"><i class="fab fa-android"></i><span>Instalar en Android</span></label>

			<input id="tab2" type="radio" name="tabs"  >
			<label for="tab2" class="tab"><i class="fab fa-apple"></i><span>Instalar en IOS</span></label>

	
			<section id="content1" class="tab-content">
				<h3>Headline 1</h3>
		      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      	cillum dolore eu fugiat nulla pariatur.</p>
			</section>

			<section id="content2" class="tab-content">
				<h3>Headline 2</h3>
		      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
		      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</section>

	
		</div>
  </div>  -->



    <footer>
        <p>Descubre Nicaragua, 2021. &copy; Todos los derechos reservados.</p>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>


</html>