<?php


function iconos_estado($estado)
{
  if ($estado=="A"){
     //$iconos_estado="ok2.gif";
	 echo "ok2.gif";
}
  if ($estado=="B"){
     //$iconos_estado="ko.gif";
	 echo "ko.gif";
}

}


function iconos_habilitado($estado)
{
  if ($estado=="1"){
     //$iconos_estado="ok2.gif";
	 echo "ok2.gif";
}
  if ($estado=="0"){
     //$iconos_estado="ko.gif";
	 echo "ko.gif";
}

}


function colores_estado($estado)
{
  if ($estado=="A") {
     $colores_estado="#009933";
}
  if ($estado=="B") {
     $colores_estado="#CC3333";
 }
}

function row($i)
{
$row[1]="#EAF2F7";
$row[2]="#FFFFFF";
}
?>