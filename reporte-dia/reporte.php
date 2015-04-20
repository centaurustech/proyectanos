<?php
session_start();
include("conectionphp/db.php");
 	require 'init.php';
	include 'includes/head.php';


$idPreg="";
$idDia =873938;
$gid=4123; //IdTipopregunta a evaluar (la pagina# de la encuesta que voy a evaluar
$sID=0;
if ($_POST["region"]!="")

{
//echo "555555555";
$sFiltro =" and ".$idDia."X4122X51964=".$_POST["region"]."";
echo $sFiltro;



}

$sSQL1 ="SELECT * FROM ".$sPRefijoBase."survey_".$idDia." where 1=1 ".$sFiltro." order by id asc ";
//echo $sSQL1;
$osurv=mysql_query($sSQL1);
$iCantiodadRespuestas = mysql_num_rows($osurv);
$ResultadoPregunta = array(
'24'=>0,
'25'=>0,
'26'=>0,
'27'=>0,
'28'=>0,
'29'=>0,
'30'=>0,
'31'=>0,
'32'=>0,
'33'=>0,
'34'=>0,
'35'=>0,
'36'=>0,
'37'=>0,
'38'=>0,
'39'=>0,
'40'=>0,
'41'=>0,
'42'=>0,
'42'=>0);
$Resultado =array(
'24'=>0,
'25'=>0,
'26'=>0,
'27'=>0,
'28'=>0,
'29'=>0,
'30'=>0,
'31'=>0,
'32'=>0,
'33'=>0,
'34'=>0,
'35'=>0,
'36'=>0,
'37'=>0,
'38'=>0,
'39'=>0,
'40'=>0,
'41'=>0,
'42'=>0);
	while($rssurv=mysql_fetch_array($osurv)){
	//Busco posicion pregunta segun ubicacion en array 19 son las pregunta
		for ($iCuentaPreg = 26;$iCuentaPreg <= 44; $iCuentaPreg++) {
			$ResultadoPregunta[$iCuentaPreg] += intval(convertirValoresEncuesta($rssurv[$iCuentaPreg]));
			}
	$sID=$idDia; //redundante pero solo para valdar que el sId exista sino da 0 y no carga nada mas
	}
	mysql_free_result($osurv);


$Resultado[1] =intval($ResultadoPregunta["24"])/$iCantiodadRespuestas;
$Resultado[2] =intval($ResultadoPregunta["25"])/$iCantiodadRespuestas;
$Resultado[3] =intval($ResultadoPregunta["26"])/$iCantiodadRespuestas;
$Resultado[4] =intval($ResultadoPregunta["27"])/$iCantiodadRespuestas;
$Resultado[5] =intval($ResultadoPregunta["28"])/$iCantiodadRespuestas;
$Resultado[6] =intval($ResultadoPregunta["29"])/$iCantiodadRespuestas;
$Resultado[7] =intval($ResultadoPregunta["30"])/$iCantiodadRespuestas;
$Resultado[8] =intval($ResultadoPregunta["31"])/$iCantiodadRespuestas;
$Resultado[9] =intval($ResultadoPregunta["32"])/$iCantiodadRespuestas;
$Resultado[10] =intval($ResultadoPregunta["33"])/$iCantiodadRespuestas;
$Resultado[11] =intval($ResultadoPregunta["34"])/$iCantiodadRespuestas;
$Resultado[12] =intval($ResultadoPregunta["35"])/$iCantiodadRespuestas;
$Resultado[13] =intval($ResultadoPregunta["36"])/$iCantiodadRespuestas;
$Resultado[14] =intval($ResultadoPregunta["37"])/$iCantiodadRespuestas;
$Resultado[15] =intval($ResultadoPregunta["38"])/$iCantiodadRespuestas;
$Resultado[16] =intval($ResultadoPregunta["39"])/$iCantiodadRespuestas;
$Resultado[17] =intval($ResultadoPregunta["40"])/$iCantiodadRespuestas;
$Resultado[18] =intval($ResultadoPregunta["41"])/$iCantiodadRespuestas;
$Resultado[19] =intval($ResultadoPregunta["42"])/$iCantiodadRespuestas;



echo "";



echo "<form name=\"filtroSurvey\" id=\"filtroSurvey\" method=\"post\" action=\"?aca\">";
echo "<table border=\"1\" width=\"850\" >";
echo "<tr>";
echo "<td width=\"25%\" valign=\"top\">";
$sSQL ="select region_id, region from ".$sPRefijoTabla."regiones";
$oRegion=mysql_query($sSQL);
echo "<select name=\"region\">";
echo "<option value=\"\">Seleccione Region</option>";
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["region_id"]."\">".$rsRegion["region"]."</option>";		
	}
mysql_free_result($oRegion);

echo "</select>";

echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"centroregional\">";

echo "<option value=\"0\">Centro Regional</option>";
$sSQL ="select centroregional_id, nombre from ".$sPRefijoTabla."centroregional";
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["centroregional_id"]."\">".$rsRegion["nombre"]."</option>";		
	}
mysql_free_result($oRegion);


echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"cluster\">";
echo "<option value=\"0\">Seleccione cluster</option>";
$sSQL ="select clusterdia_id, nombre from ".$sPRefijoTabla."clusterdia";
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["clusterdia_id"]."\">".$rsRegion["nombre"]."</option>";		
	}
mysql_free_result($oRegion);

echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"gestion\">";
echo "<option value=\"0\">Seleccione gestion</option>";
$sSQL ="select gestiondia_id, nombre from ".$sPRefijoTabla."gestiondia";
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["gestiondia_id"]."\">".$rsRegion["nombre"]."</option>";		
	}
mysql_free_result($oRegion);
echo "</select>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"supervisor\">";
echo "<option value=\"0\">supervisor</option>";
$sSQL ="select supervisordia_id, nombre from ".$sPRefijoTabla."supervisordia";
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
		$sNombre = $rsRegion["nombre"];
		$sNombre = substr($sNombre,0,20);
			if (strlen($sNombre)>(20-1));{
			$sNombre = $sNombre ."...";
			}
echo "<option value=\"".$rsRegion["supervisordia_id"]."\">".$sNombre."</option>";		
	}
mysql_free_result($oRegion);
echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"jefezonal\">";
echo "<option value=\"0\">jefe zonal</option>";
$sSQL ="select jefezonaldia_id, nombre from ".$sPRefijoTabla."jefezonaldia";
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
		$sNombre = $rsRegion["nombre"];
		$sNombre = substr($sNombre,0,20);
			if (strlen($sNombre)>(20-1));{
			$sNombre = $sNombre ."...";
			}
echo "<option value=\"".$rsRegion["jefezonaldia_id"]."\">".$sNombre."</option>";		
	}
mysql_free_result($oRegion);
echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"gerente\">";
echo "<option value=\"0\">gerente </option>";
echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<input id=\"bconsultar\" name=\"bconsultar\" type=\"submit\" value=\"Consultar\">";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";

echo "<table border=\"1\" width=\"850\" name=\"reporte\" id=\"reporte\">";
echo "<tr>";
echo "<td width=\"60%\">";
echo "";
echo "</td>";
echo "<td>";
echo "<strong>ONLINE</strong>";
echo "</td>";
echo "<td>";
echo "<strong>PRESENCIAL</strong>";
echo "</td>";
echo "<td>";
echo "<strong>TOTAL</strong>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td >";
echo "<strong>DESEMPEÑO</strong>";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "NPS";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Cantidad evaluaciones";
echo "</td>";
echo "<td>";
echo $iCantiodadRespuestas;
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "<td>";
echo $iCantiodadRespuestas;
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan=\"4\">";
echo "<br>";
echo "<hr>";
echo "<br>";
echo "</td>";
echo "</tr>";

$iCuentaPregunta=1;

$sSQL ="SELECT distinct qg.qgid,qg.nombre,qg.porcentaje from ".$sPRefijoTabla."questions_group_rel qgr inner join ".$sPRefijoBase."questions q on q.title=qgr.title inner join ".$sPRefijoTabla."questions_group qg on qg.qgid=qgr.qgid where q.sid=".$sID."";

//echo $sSQL;

$oquestiongroup=mysql_query($sSQL);

	while($rsquestiongroup=mysql_fetch_assoc($oquestiongroup)){
	
	echo "<tr class=\"".$rsquestiongroup["nombre"]."\">";
	echo "<td class=\"pregunta\" width=\"60%\">";
	echo strtoupper($rsquestiongroup["nombre"]);
	echo "</td>";
	echo "<td>";
	echo $rsquestiongroup["porcentaje"]."%";
	echo "</td>";
	echo "<td>";
	echo $rsquestiongroup["porcentaje"]."%";
	echo "</td>";
	echo "<td>";
	echo $rsquestiongroup["porcentaje"]."%";
	echo "</td>";
	echo "</tr>";
	
		//$sSQL ="SELECT q.qid,q.question,qgr.porcent FROM questions q inner join questions_group_rel qgr on qgr.qid=q.qid where q.sid=".$sID." and q.gid=".$gid." order by q.qid asc";

$sSQL ="SELECT q.title,q.question,qgr.porcent FROM ".$sPRefijoBase."questions q inner join ".$sPRefijoTabla."questions_group_rel qgr on qgr.title=q.title where q.sid=".$sID." and qgr.qgid=".$rsquestiongroup["qgid"]." order by id asc ";
		
		
		//echo $sSQL;
		$oquestion=mysql_query($sSQL);
		while($rsquestion=mysql_fetch_assoc($oquestion)){
		
		$iPorcentajeRelev = intval($rsquestion["porcent"]);		
		$iResultadoPregRelev= ($ResultadoPregunta[intval($iCuentaPregunta)+23]/$iCantiodadRespuestas)*intval($rsquestion["porcent"])/100;
		$iResultadoPregPresencial = 0;
		$iResultadoPregTotal =$iResultadoPregRelev + $iResultadoPregPresencial;
		
		echo "<tr>";
		echo "<td>";
		echo $rsquestion["title"].": ";
		echo $rsquestion["question"];
		echo "</td>";
		echo "<td valign=\"top\">";
		echo "Ref:".$iPorcentajeRelev."%";
		echo "<br>";		
		echo "Resultado: ".$iResultadoPregRelev;		
		echo "%";
		echo "</td>";
		echo "<td valign=\"top\">";
		echo "Ref:".$iPorcentajeRelev."%";
		echo "<br>";		
		echo "Resultado: ".$iResultadoPregPresencial;		
		echo "</td>";
		echo "<td valign=\"top\">";
		echo "Ref:".$iPorcentajeRelev."%";
		echo "<br>";		
		echo "Resultado: ".$iResultadoPregTotal;		
		echo "</td>";
		echo "</tr>";
		
		$iCuentaPregunta++;
		}
	echo "<tr>";
	echo "<td colspan=\"4\">";
	echo "<br>";
	echo "<hr>";
	echo "<br>";
	echo "</td>";
	echo "</tr>";
	}


echo "</table>";

die();
$sSQL ="SELECT q.title,q.question,qgr.porcent FROM ".$sPRefijoBase."questions q inner join ".$sPRefijoTabla."questions_group_rel qgr on qgr.title=q.title where q.sid=".$sID." and q.gid=".$gid." order by q.title asc";
//echo $sSQL;

$iSumaPorcent=0;
$oserHome=mysql_query($sSQL);
while($rsSerHome=mysql_fetch_assoc($oserHome)){
//while($rsSerHome=mysql_fetch_array($oserHome)){
  //echo $rsSerHome["qid"]."-".$rsSerHome["question"]."/".$rsSerHome["porcent"]."<br>";
  
  //$iSumaPorcent +=$rsSerHome["porcent"];
  
}


//echo "<br><br>total".$iSumaPorcent;

if (mysql_num_rows($oserHome) > "0"){

}

function convertirValoresEncuesta($ValorRef){
//Convetir a la nomenclatura de dia
switch ($ValorRef) {
    case 1:
		$sResult=100;
        break;
    case 2:
		$sResult=85;
        break;
    case 3:
		$sResult=50;
        break;
    case 4:
		$sResult=0;
        break;

}
//echo $sResult;
//return "1";
return $sResult;
}

?>
<?php 
  include 'includes/right.php';
  
  include 'includes/footer.php';
?>