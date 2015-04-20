<?php
session_start();
include("conectionphp/db.php");
require 'init.php';
include 'includes/head.php';

/*para dattatec*/
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";


$sPRefijoBase ="lime_";
$sPRefijoTabla ="dia_";
$idDia =563638;




//$sSQL2 ="update dia_tiendasdia set provincia_id='4000' where PROVINCIA='CORRIENTES'";
//$otraerIDG2=mysql_query($sSQL2);
//die();

$idPreg="";
$sTiendaBusca="";
$gid=5; //IdTipopregunta a evaluar (la pagina# de la encuesta que voy a evaluar
$sID=0;
$idTienda = 0;
$idProvincia = 0;
$iCuentaPreg = 1;

$sTiendaGroup =0;
$sSQL ="SELECT gid FROM `".$sPRefijoBase."groups` where sid='".$idDia."' and group_name='#02'";
$otraerIDG=mysql_query($sSQL);
$rstraerIDG=mysql_fetch_assoc($otraerIDG);
$sTiendaGroup = $rstraerIDG["gid"];
//echo $sTiendaGroup;
//die();


$sFiltro ="";
$sFiltroTienda ="";
$sFiltroProvincia ="";
$sFiltroLocalidad ="";

$sSQL ="SELECT * FROM ".$sPRefijoBase."questions WHERE sid='".$idDia."' and title in ('D3_1', 'D3_2_1', 'D3_2_2', 'D3_3', 'D3_4', 'D3_5', 'D3_6', 'D3_7') order by question_order asc";
$otraerIDpreg=mysql_query($sSQL);
$PreguntaTienda = array('D3_1'=>0,'D3_2_1'=>0,'D3_2_2'=>0,'D3_3'=>0,'D3_4'=>0,'D3_5'=>0,'D3_6'=>0,'D3_7'=>0);

$sFiltroTienda = substr($sFiltroTienda, 0, -3);


if ($_POST["tiendasdia_id"]!="")
{
	$sFiltroTienda .=" and ";
	while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
			//$PreguntaTienda[$iCuentaPreg] = $rstraerIDpreg["qid"];
			$sFiltroTienda .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."`='".$_POST["tiendasdia_id"]."' or";
	//$iCuentaPreg++;
	}
	$sFiltro = $sFiltroTienda;
}
else//Si no seleccion tienda busco por provincia o localidad
{
	if ($_POST["localidad_id"]!="")
	{
		$sFiltroLocalidad= "";
		
		
		$sSQL= "select l.nombre,t.tiendasdia_id from dia_localidades l inner join dia_tiendasdia t on l.localidad_id=t.localidad_id where l.localidad_id='".$_POST["localidad_id"]."'";
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroLocalidad .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroLocalidad .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroLocalidad = substr($sFiltroLocalidad, 0, -2);
		$sFiltro .= $sFiltroLocalidad;
		
		
		
	}
	elseif ($_POST["provincia_id"]!="")
	{
		$sSQL= "select p.nombre,t.tiendasdia_id from dia_provincias p inner join dia_tiendasdia t on p.provincia_id=t.provincia_id where p.provincia_id='".$_POST["provincia_id"]."'";
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;
	}
}

if ($_POST["centroregional"]!="")
{

		$sSQL= "select t.tiendasdia_id from  dia_tiendasdia t where t.centroregional_id='".$_POST["centroregional"]."'";
		//echo $sSQL;
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;

}
if ($_POST["cluster"]!="")
{

		$sSQL= "select t.tiendasdia_id from  dia_tiendasdia t where t.clusterdia_id='".$_POST["cluster"]."'";
		///echo $sSQL;
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;

}
if ($_POST["gestion"]!="")
{

		$sSQL= "select t.tiendasdia_id from  dia_tiendasdia t where t.gestiondia_id='".$_POST["gestion"]."'";
		//echo $sSQL;
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;

}
if ($_POST["supervisor"]!="")
{

		$sSQL= "select t.tiendasdia_id from  dia_tiendasdia t where t.supervisordia_id='".$_POST["supervisor"]."'";
		//echo $sSQL;
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;

}

if ($_POST["jefezonal"]!="")
{

		$sSQL= "select t.tiendasdia_id from  dia_tiendasdia t where t.jefezonaldia_id='".$_POST["jefezonal"]."'";
		//echo $sSQL;
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;

}
if ($_POST["gerente"]!="")
{

		$sSQL= "select t.tiendasdia_id from  dia_tiendasdia t where t.gerente_id='".$_POST["gerente"]."'";
		//echo $sSQL;
		$otraerPcia=mysql_query($sSQL);	
		while($rstraerPcia=mysql_fetch_assoc($otraerPcia))
		{
			$sIdTienda .= "'".$rstraerPcia["tiendasdia_id"]."',";
		}
		$sIdTienda = substr($sIdTienda, 0, -1);		
	$sFiltroProvincia .=" and ";
		while($rstraerIDpreg=mysql_fetch_assoc($otraerIDpreg)){
				$sFiltroProvincia .= "`".$idDia."X".trim($rstraerIDG["gid"])."X".trim($rstraerIDpreg["qid"])."` in (".$sIdTienda.") or";
		}
		$sFiltroProvincia = substr($sFiltroProvincia, 0, -2);
		$sFiltro .= $sFiltroProvincia;

}



//$sFiltro = $sFiltroTienda.$sFiltroProvincia.$sFiltroLocalidad;

$sSQL1 ="SELECT * FROM `ext_survey_".$idDia."` where `lastpage`='4' ".$sFiltro." order by id asc ";
//echo $sSQL1;
$osurv=mysql_query($sSQL1);
$iCantiodadRespuestas = mysql_num_rows($osurv);
$ResultadoPregunta = array('24'=>0, '25'=>0,'26'=>0,'27'=>0,'28'=>0,'29'=>0,'30'=>0,'31'=>0,'32'=>0,'33'=>0,'34'=>0,'35'=>0,'36'=>0,'37'=>0,'38'=>0,'39'=>0,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0);

$Resultado =array('24'=>0, '25'=>0,'26'=>0,'27'=>0,'28'=>0,'29'=>0,'30'=>0,'31'=>0,'32'=>0,'33'=>0,'34'=>0,'35'=>0,'36'=>0,'37'=>0,'38'=>0,'39'=>0,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0);
	while($rssurv=mysql_fetch_array($osurv)){
	//Busco posicion pregunta segun ubicacion en array 19 son las pregunta
		for ($iCuentaPreg = 25;$iCuentaPreg <= 44; $iCuentaPreg++) {
			$ResultadoPregunta[$iCuentaPreg] += intval(convertirValoresEncuesta($rssurv[$iCuentaPreg]));
			//echo $rssurv[0].",<br>";
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
$Resultado[20] =intval($ResultadoPregunta["43"])/$iCantiodadRespuestas;
$Resultado[21] =intval($ResultadoPregunta["44"])/$iCantiodadRespuestas;


//echo $ResultadoPregunta["44"];

echo "\n";
echo "<script>\n";
echo "<!--\n";
echo "function cargaformLoc(provincia_id){ \n";
echo " var e = document.createElement(\"script\");\n";
echo "     document.getElementById(\"localidad_id\").length=0;\n";
echo "   document.getElementById(\"localidad_id\")[0] = new Option(\"Cargando...\",\"\");\n";
echo "  url = \"generalocalidades.php?provincia_id=\"+ provincia_id;\n";
echo "  e.src = url;\n";
echo "  e.type=\"text/javascript\";\n";
echo "  document.getElementsByTagName(\"head\")[0].appendChild(e);} \n";
echo "-->\n";
echo "</script>\n";

echo "\n";
echo "<script>\n";
echo "<!--\n";
echo "function cargaformTienda(localidad_id){ \n";
echo " var e = document.createElement(\"script\");\n";
echo "     document.getElementById(\"tiendasdia_id\").length=0;\n";
echo "   document.getElementById(\"tiendasdia_id\")[0] = new Option(\"Cargando...\",\"\");\n";
echo "  url = \"generatiendas.php?localidad_id=\"+ localidad_id;\n";
echo "  e.src = url;\n";
echo "  e.type=\"text/javascript\";\n";
echo "  document.getElementsByTagName(\"head\")[0].appendChild(e);} \n";
echo "-->\n";
echo "</script>\n";


echo "<form name=\"filtroSurvey\" id=\"filtroSurvey\" method=\"post\" action=\"\">";
echo "<table border=\"1\" width=\"850\" >";
echo "<tr>";
echo "<td width=\"25%\" valign=\"top\">";
$sSQL ="select provincia_id, nombre from ".$sPRefijoTabla."provincias order by nombre asc";
$oRegion=mysql_query($sSQL);
echo "<select name=\"provincia_id\"  id=\"provincia_id\" onChange=\"cargaformLoc(this.value);\">";
echo "<option value=\"\">Seleccione Provincia</option>";
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["provincia_id"]."\">".$rsRegion["nombre"]."</option>";		
	}
mysql_free_result($oRegion);
echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"localidad_id\"  id=\"localidad_id\" onChange=\"cargaformTienda(this.value);\">";
echo "<option value=\"\">Seleccione localidad</option>";
mysql_free_result($oRegion);
echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";

echo "<select name=\"tiendasdia_id\" id=\"tiendasdia_id\">";
echo "<option value=\"\">Tienda, todos</option>";
$sSQL ="select tiendasdia_id, almacen,direccion from ".$sPRefijoTabla."tiendasdia";
//echo $sSQL;
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
		$sNombre = $rsRegion["direccion"];
		$sNombre = substr($sNombre,0,19);
			if (strlen($sNombre)>(19-1));{
			$sNombre = $sNombre ."";
			}
echo "<option value=\"".$rsRegion["tiendasdia_id"]."\">".$rsRegion["tiendasdia_id"].":".$sNombre."</option>";		
	}
mysql_free_result($oRegion);
echo "</select>";


echo "</td>";


echo "</tr>";
echo "<tr>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"centroregional\" id=\"centroregional\">";

echo "<option value=\"\">Centro Regional</option>";
$sSQL ="select centroregional_id, nombre from ".$sPRefijoTabla."centroregional order by nombre asc";
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["centroregional_id"]."\">".$rsRegion["nombre"]."</option>";		
	}
mysql_free_result($oRegion);


echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"cluster\">";
echo "<option value=\"\">Seleccione cluster</option>";
$sSQL ="select clusterdia_id, nombre from ".$sPRefijoTabla."clusterdia order by nombre asc" ;
$oRegion=mysql_query($sSQL);
	while($rsRegion=mysql_fetch_assoc($oRegion)){
echo "<option value=\"".$rsRegion["clusterdia_id"]."\">".$rsRegion["nombre"]."</option>";		
	}
mysql_free_result($oRegion);

echo "</select>";
echo "</td>";
echo "<td width=\"25%\" valign=\"top\">";
echo "<select name=\"gestion\">";
echo "<option value=\"\">Seleccione gestion</option>";
$sSQL ="select gestiondia_id, nombre from ".$sPRefijoTabla."gestiondia  order by nombre asc";
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
echo "<option value=\"\">supervisor</option>";
$sSQL ="select supervisordia_id, nombre from ".$sPRefijoTabla."supervisordia  order by nombre asc";
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
echo "<option value=\"\">jefe zonal</option>";
$sSQL ="select jefezonaldia_id, nombre from ".$sPRefijoTabla."jefezonaldia  order by nombre asc";
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
echo "<option value=\"\">gerente </option>";
echo "</select>";
echo "</td>";

echo "</tr>";
echo "<tr>";
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
echo "<strong>REF</strong>";
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
echo "<strong>DESEMPEЏ</strong>";
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
echo "<td>";
echo "";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Cantidad evaluaciones";
echo "</td>";
echo "<td>";
echo "";
echo "</td>";
echo "<td>";

echo "</td>";
echo "<td>";
echo $iCantiodadRespuestas;
echo "</td>";
echo "<td>";
echo $iCantiodadRespuestas;
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan=\"5\">";
echo "<br>";
echo "<hr>";
echo "<br>";
echo "</td>";
echo "</tr>";

$iCuentaPregunta=1;
$iPorcentajeGrupo = 0;


$sSQL ="SELECT distinct qg.qgid,qg.nombre,qg.porcentaje from ".$sPRefijoTabla."questions_group_rel qgr inner join ".$sPRefijoBase."questions q on q.qid=qgr.qid inner join ".$sPRefijoTabla."questions_group qg on qg.qgid=qgr.qgid where q.sid=".$sID."";

//echo "<br>---<br>";
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
//	echo $rsquestiongroup["porcentaje"]."%";
	echo "</td>";
	echo "<td>";
//	echo $rsquestiongroup["porcentaje"]."%";
	echo "</td>";
	echo "<td>";
//	echo $rsquestiongroup["porcentaje"]."%";
	echo "</td>";
	echo "</tr>";
	
		//$sSQL ="SELECT q.qid,q.question,qgr.porcent FROM questions q inner join questions_group_rel qgr on qgr.qid=q.qid where q.sid=".$sID." and q.gid=".$gid." order by q.qid asc";
		$sSQL ="SELECT q.qid,q.question,qgr.porcent FROM ".$sPRefijoBase."questions q inner join ".$sPRefijoTabla."questions_group_rel qgr on qgr.qid=q.qid where qgr.qgid=".$rsquestiongroup["qgid"]." order by q.qid asc ";
		//echo "<br>".$sSQL."<br>";
		$oquestion=mysql_query($sSQL);
		$iCantidadResp = mysql_num_rows($oquestion);
		
		$iPorcentajeGrupo = 0;
		$iResultadoPregRelevTotal = 0;
		while($rsquestion=mysql_fetch_assoc($oquestion)){
		
		$iPorcentajeRelev = intval($rsquestion["porcent"]);	
		$iPorcentajeGrupo += intval($rsquestion["porcent"]);	
		//echo	"<br>porcent: ".$ResultadoPregunta[intval($iCuentaPregunta)+24]."<br>";
		//$iResultadoPregRelev= ($ResultadoPregunta[intval($iCuentaPregunta)+24]/$iCantiodadRespuestas)*intval($rsquestion["porcent"])/100;
		
		$iResultadoPregRelev= ($ResultadoPregunta[intval($iCuentaPregunta)+24]/$iCantiodadRespuestas);
		
		//echo $iResultadoPregRelev."<br>";
		$iResultadoPregPresencial = 0;
		$iResultadoPregTotal =$iResultadoPregRelev + $iResultadoPregPresencial;
		$iResultadoPregRelevTotal += $iResultadoPregRelev/$iCantidadResp;
		
		echo "<tr>";
		echo "<td>";
		echo $rsquestion["qid"].": ";
		echo $rsquestion["question"];
		echo "</td>";
		echo "<td valign=\"top\">";
		echo "".round($iPorcentajeRelev);		
		echo "%";
		echo "</td>";
		echo "<td valign=\"top\">";
		//echo "Ref:".$iPorcentajeRelev."%";
		//echo "<br>";		
		//echo " ".round($iResultadoPregRelev);		
		//echo "%";
		echo "</td>";
		echo "<td valign=\"top\">";
		//echo "Ref:".$iPorcentajeRelev."%";
		//echo "<br>";		
		echo " ".round($iResultadoPregRelev)."%";			
		echo "</td>";
		echo "<td valign=\"top\">";
		//echo "Ref:".$iPorcentajeRelev."%";
		//echo "<br>";		
		echo "".round($iResultadoPregTotal)."%";	

		echo "</td>";
		echo "</tr>";

		
		$iCuentaPregunta++;
		}
		echo "<tr>";
		echo "<td>";
		echo "total";
		echo "</td>";
		echo "<td>";
		echo "".$iPorcentajeGrupo."%";	
		echo "</td>";
		echo "<td>";
		echo "</td>";
		echo "<td>";
		echo round($iResultadoPregRelevTotal)."%<br>";
		//echo round($iResultadoPregRelevTotal) *$iPorcentajeGrupo/100;
		echo "</td>";
		echo "</tr>";
		
		$iResultadoPregRelevTotalDia += $iResultadoPregRelevTotal *$iPorcentajeGrupo/100;
		
		//$iResultadoPregRelevTotalDia +=$iResultadoPregRelevTotal;
	}

	echo "<tr>";
	echo "<td colspan=\"5\">";
	echo "<br>";
	echo "<hr>";
	echo "total dia:".round($iResultadoPregRelevTotalDia)."%";
	echo "<br>";
	echo "</td>";
	echo "</tr>";
echo "</table>";









function convertirValoresEncuesta($ValorRef)
{
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
