<?php
session_start();
include("conectionphp/db.php");

	$region_id = $_GET["region_id"];
//	echo "00";

if ($region_id !="")
{
$sSQL1 ="select provincia_id,nombre from dia_provincias where region_id=".$region_id."";
echo $sSQL1;
$osurv=mysql_query($sSQL1);

$i=1;
	
if (mysql_num_rows($osurv) > 0) {
	echo "document.getElementById(\"provincia_id\")[0] = new Option(\"Seleccione\",\"\");";
	
	while($rssurv=mysql_fetch_array($osurv)){
	
	echo "document.getElementById(\"provincia_id\")[".$i."] = new Option(\"".$rssurv["nombre"]."\",\"".$rssurv["nombre"]."\");";
	$i++;
	}
	
}else{
	echo "document.getElementById(\"provincia_id\")[0] = new Option(\"NO HAY PCIAS\",\"\");";
}

}
?>