	<div class="espacio"></div>
	<footer>
  	<div id="pie">
		2015 Todos los Derechos Reservados.
    <?php 
              // Enlaces mediante sesion
	if($_SESSION == TRUE){
                echo '<a href="'.Site.'/logout.php">Salir</a>';
	}else{
                echo '<a href="'.Site.'/register.php">Registro</a> | <a href="'.Site.'/login.php">Acceder</a>';
	}?>
		</div>
	</footer>
</div>
</body>
</html>