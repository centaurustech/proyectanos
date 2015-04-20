<?php
session_start();
include("conectionphp/db.php");



	$provincia_id = $_GET["provincia_id"];
//	echo "00";

if ($provincia_id !="")
{
$sSQL1 ="select localidad_id,nombre from dia_localidades where provincia_id=".$provincia_id." order by nombre asc";
//echo $sSQL1;
$osurv=mysql_query($sSQL1);

$i=1;
	
if (mysql_num_rows($osurv) > 0) {
	echo "document.getElementById(\"localidad_id\")[0] = new Option(\"Seleccione\",\"\");";
	
	while($rssurv=mysql_fetch_array($osurv)){
	
	echo "document.getElementById(\"localidad_id\")[".$i."] = new Option(\"".$rssurv["nombre"]."\",\"".$rssurv["localidad_id"]."\");";
	$i++;
	}
	
}else{
	echo "document.getElementById(\"localidad_id\")[0] = new Option(\"NO HAY LOC\",\"\");";
}

}
?>