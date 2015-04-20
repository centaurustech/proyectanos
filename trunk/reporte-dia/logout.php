<?php 
  require 'init.php';
  include 'includes/head.php';
  ofSES();
  include 'kernel/core_users.php';
?>

       <article class="Articles">
         <div class="head"><h2>Salir de <?php echo BN('title') ?></h2></div>
         <div class="temp">

         	<h4>Estas por cerrar sesión <?php echo userD($USERID,'user') ?> </h4>

         	<form class="Addsled" method="POST">

         			<input type="submit" name="user_logout" value="Cerrar mi cuenta">

              <a href="<?php echo Site ?>/index.php?out=cancel"><span class="cancel">Cancelar</span></a>

         	</form>

         </div>
       </article>

<?php 
  include 'includes/right.php';
  include 'includes/footer.php';
?>