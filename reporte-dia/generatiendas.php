<?php
session_start();
include("conectionphp/db.php");



	$localidad_id = $_GET["localidad_id"];
//	echo "00";

if ($localidad_id !="")
{
$sSQL1 ="select tiendasdia_id,direccion from dia_tiendasdia where localidad_id=".$localidad_id."";
//echo $sSQL1;
$osurv=mysql_query($sSQL1);

$i=1;
	
if (mysql_num_rows($osurv) > 0) {
	echo "document.getElementById(\"tiendasdia_id\")[0] = new Option(\"Seleccione\",\"\");";
	
	while($rssurv=mysql_fetch_array($osurv)){
	
	echo "document.getElementById(\"tiendasdia_id\")[".$i."] = new Option(\"".$rssurv["tiendasdia_id"].":".$rssurv["direccion"]."\",\"".$rssurv["tiendasdia_id"]."\");";
	$i++;
	}
	
}else{
	echo "document.getElementById(\"tiendasdia_id\")[0] = new Option(\"NO HAY Tiendas\",\"\");";
}

}
?>