<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title><?php echo BN('title') ?> &bull; <?php echo BN('slogan') ?></title>
   <link href="<?php echo Site ?>/index.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo Site ?>/reset.css" rel="stylesheet" type="text/css" />
   <link rel="icon" type="image/png" href="<?php echo Site ?>/img/favicon.png">
</head>
<body>

   <div id="web">

      <?php 
        if(userD($USERID,'rank') >= 5)
        {
          echo '<div class="Float">
                  <a href="'.Site.'/bmpanel/index.php"><fieldset>Administración</fieldset></a>
                </div>';
        }
      ?>

       
       <nav>
          <ul>
            <li><a href="<?php echo Site ?>/index.php">Inicio</a></li>
            <li><a href="<?php echo Site ?>/minichat.php">Minichat</a></li>
            <li><a href="<?php echo BN('room') ?>" target="_blank">Sala oficial</a></li>
            <li><a href="<?php echo BN('planb') ?>" target="_blank">Plan B</a></li>
            <li><a href="<?php echo Site ?>/team.php">Equipo</a></li>
            <li><a href="<?php echo Site ?>/catalogo/all">Catálogo</a></li>
    
            <?php 
              // Enlaces mediante sesion
              if($_SESSION == TRUE)
              {
                echo '<li><a href="'.Site.'/account/'.$USERID.'">'.userD($USERID,'user').'</a></li>
                      <li><a href="'.Site.'/logout.php">Salir</a></li>';
              }
              else
              {
                echo '<li><a href="'.Site.'/register.php">Registro</a></li>
                      <li><a href="'.Site.'/login.php">Acceder</a></li>';
              }
            ?>

          </ul>
        </nav>
        
        
        <div id="header">
           <a href="<?php echo Site ?>">
            <img src="<?php echo Site ?>/img/logo.png"/>
           </a>
           <div id="dj_says">Estamos buscando DJ's información en el xat</div>
     
     
       </div>
       
       <div class="Content">
  
       <div class="Left">

        