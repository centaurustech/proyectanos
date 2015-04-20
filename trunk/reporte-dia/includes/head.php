<!DOCTYPE html>
<html>
<head>
   <title><?php echo BN('title') ?> &bull; <?php echo BN('slogan') ?></title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <!--<meta http-equiv="Content-Type" content="image/png; charset=ISO-8859-1" />-->
   <link href="<?php echo Site ?>/estilo.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo Site ?>/estilo1.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo Site ?>/reset.css" rel="stylesheet" type="text/css" />
   <link rel="icon" type="image/png" href="<?php echo Site ?>/img/favicon.png">
   <script type="text/javascript" src="js/jquery.js"></script>
   <script src="js/efects.js"></script>
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div id="contenedor">
	<div id="header">
    <div id="logo">
    	<a href="<?php echo Site ?>"><img src="<?php echo Site ?>/img/logodia.png"/></a>
    </div>
    <nav>
    	<ul>
    	<li><a href="<?php echo Site ?>/index.php">inicio</a></li>
        <li><a href="<?php echo Site ?>/reporteDia.php">Reporte</a></li>
        <li><a href="<?php echo Site ?>/graficos/index.php">Graficos</a></li> 
				<?php  if (!(isset($_SESSION["idadm"]))){;?>
        <li style="float:right;"><a href="<?php echo Site ?>/login.php">Acceder</a></li>
				<?php }else{  ?>
					<li id="perfil" style="float:right;"><a href="salir.php"><?php echo $_SESSION["nombre"]; ?></a></li>
				<?php } ?>
			</ul>
		</nav>     
	</div>
<!-- </div> Este div cierra en el footer-->
       


    
