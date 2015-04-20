<?php 
  require 'init.php';
  include 'includes/head.php';
  onSES();
  include 'kernel/core_users.php';
  
  //$userID = SLS2($_GET['id']);
  
  $usuario = $_GET['user'];
  $password = $_GET['pass'];
  $action = $_GET['action'];
  
  
  //Consultamos en la base de datos
 // $userPR = MYSQL_::Bits("SELECT * FROM users_news WHERE id = '$userID' ");
  //$userP  = mysqli_fetch_assoc($userPR);
  
?>

       <article class="Articles">
         <div class="head"><h2>Accede a <?php echo BN('title') ?></h2></div>
         <div class="temp">

         	<h4>Utiliza tus datos de usuario para iniciar sesión</h4>

	<form class="Addsled" method="POST">
	<fieldset>
	<label>Usuario
	<input type="text" name="user" placeholder="Escribe tu usuario" maxlength="45" value="<?php echo $usuario ?>"></label>
	</fieldset>

	<fieldset>
	<label>Contraseña
    <input type="password" name="pass" placeholder="Escribe tu contraseña" maxlength="32" value="<?php echo $password ?>"> </label>
	</fieldset>

	<input type="submit" name="user_acceder" value="Acceder"> | <div class="Float2"><fieldset><a href="register.php">Registrate</a></fieldset></div>

	</form>


         </div>
       </article>

<?php 
  include 'includes/right.php';
  include 'includes/footer.php';
?>