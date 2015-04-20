<?php session_start();
include("conectionphp/db.php");
if ($_POST["accion"]=="1"){;

$clave=$_POST["pass"];
$email=$_POST["email"];
$primero = "select reporte,id_administra,nivel,nombre,password,estado from administra where estado='A'  and nombre='$email' and password='$clave'";

//echo $primero;
$segundo = mysql_query($primero);
if ($segundo<>"") {;
$orescon = mysql_fetch_assoc($segundo);
$_SESSION["idadm"]=$orescon["id_administra"];
$_SESSION["nombre"]=$orescon["nombre"];
$_SESSION["nivel"]=$orescon["nivel"];

$_SESSION["reporte"]=$orescon["reporte"];








//echo $_SESSION["idadm"];
//die();
} ;
} ;

 ?>


<?php 
if (!(isset($_SESSION["idadm"]))){;?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>ADM</title>

<link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#CCCCCC">
<form name="form1" method="POST" action="">
<input name="accion" type="hidden" value="1" />
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" class="texto" >
    <tr>
      <th bgcolor="#CC0000" ><div align="center">Por Favor identifiquese: </div></th>
    </tr>
    <tr >
      <td ><table width="100%" border="0" cellpadding="0" cellspacing="2">
          <tr>
            <td >&nbsp;</td>
            <td width="64%">&nbsp;</td>
          </tr>
          <tr>
            <td width="36%" class="blank" ><div align="right"><strong>Usuario:</strong></div></td>
            <td><input name="email" type="text" id="email" size="30">
            </td>
          </tr>
          <tr>
            <td class="blank"><div align="right" ><strong>Password:</strong></div></td>
            <td><input name="pass" type="password"  id="pass" size="30"></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
                <input name="Submit" type="submit"  value="Login">
            </div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>



<?php  }else {;?>

<script languaje="javascript">location.assign('index1.php');</script>
<?php  };?>

