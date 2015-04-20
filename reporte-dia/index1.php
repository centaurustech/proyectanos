<?php 
  require 'init.php';
  include 'includes/head.php';
?>

<?php 

$noRegistros = 3; //Registros por página
$pagina = 1; //Por default, página = 1
if($_GET["pagina"]) //Si hay página por ?pagina=valor, lo asigna
    $pagina = $_GET["pagina"];

//Utilizo el comando LIMIT para seleccionar registros
	$sSQL = MYSQL_::Bits("SELECT * FROM articles_news ORDER BY id DESC LIMIT ".($pagina-1)*$noRegistros.",$noRegistros");
    while($rowQ = mysqli_fetch_assoc($sSQL))
     {
       echo '<article class="Articles">
         		<div class="head"><h2>'.$rowQ['title'].'</h2></div>
         		<div class="temp">'.ART($rowQ['content']).'</div>
       		</article>';          
  	 }

//Imprimiendo páginas
$sSQL = MYSQL_::Bits("SELECT count(*) FROM articles_news");
$row = mysqli_fetch_array($sSQL);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable

            echo '<div class="numPag">';
 
            $noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de páginas
            for($i=1; $i<$noPaginas+1; $i++) 
            { //Imprimo las páginas
              if($i == $pagina)
              {
                echo '<a href="#" class="unique">'.$i.'</a>'; //A la página actual no le pongo link
              }
              else
              {
                echo '<a href="'.Site.'/index.php/'.$i.'">'.$i.'</a>';
              }
            }

             echo '</div>';
?>

<?php 
  include 'includes/right.php';
  
  include 'includes/footer.php';
?>