<?php 
    #Funcion para buscar la IP verdadera de un usuario
	function iP() 
	{
     
     	if (isset($_SERVER["HTTP_CLIENT_IP"]))
     	{
         	return $_SERVER["HTTP_CLIENT_IP"];
     	}
     	elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
     	{
         	return $_SERVER["HTTP_X_FORWARDED_FOR"];
     	}
     	elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
     	{
         	return $_SERVER["HTTP_X_FORWARDED"];
    	}
     	elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
            {
         	return $_SERVER["HTTP_FORWARDED_FOR"];
     	}
     	elseif (isset($_SERVER["HTTP_FORWARDED"]))
     	{
         	return $_SERVER["HTTP_FORWARDED"];
     	}
     	else
     	{
          	return $_SERVER["REMOTE_ADDR"];
     	}
     
	}

    #Funcion para limpiar variables en formularios
    function SLS3($var)
    {
        $var = htmlspecialchars($var);
        $var = str_replace("'", "-", $var);
        $var = str_replace("á", "a", $var);
        $var = str_replace("í", "i", $var);
        $var = str_replace("é", "e", $var);
        $var = str_replace("ú", "u", $var);
        $var = str_replace("ó", "o", $var);
        return $var;
    }

    #Funcion para convertir la fecha (de codigo) a tiempo actual hablado
    function timeC($valor)
    {
        // FORMATOS:
        // segundos    desde 1970 (función time())        hace_tiempo('12313214');
        // defecto (variable $formato_defecto)        hace_tiempo('12:01:02 04-12-1999');
        // tu propio formato                        hace_tiempo('04-12-1999 12:01:02 [n.j.Y H:i:s]');

        $formato_defecto="H:i:s j-n-Y";

        // j,d = día
        // n,m = mes
        // Y = año
        // G,H = hora
        // i = minutos
        // s = segundos

      if(stristr($valor,'-') || stristr($valor,':') || stristr($valor,'.') || stristr($valor,','))
        {

            if(stristr($valor,'['))
            {
                $explotar_valor=explode('[',$valor);
                $valor=trim($explotar_valor[0]);
                $formato=str_replace(']','',$explotar_valor[1]);
            }
            else
            {
                $formato=$formato_defecto;
            }

                $valor = str_replace("-"," ",$valor);
                $valor = str_replace(":"," ",$valor);
                $valor = str_replace("."," ",$valor);
                $valor = str_replace(","," ",$valor);

                $numero = explode(" ",$valor);

                $formato = str_replace("-"," ",$formato);
                $formato = str_replace(":"," ",$formato);
                $formato = str_replace("."," ",$formato);
                $formato = str_replace(","," ",$formato);

                $formato = str_replace("d","j",$formato);
                $formato = str_replace("m","n",$formato);
                $formato = str_replace("G","H",$formato);

                $letra = explode(" ",$formato);

                $relacion[$letra[0]]=$numero[0];
                $relacion[$letra[1]]=$numero[1];
                $relacion[$letra[2]]=$numero[2];
                $relacion[$letra[3]]=$numero[3];
                $relacion[$letra[4]]=$numero[4];
                $relacion[$letra[5]]=$numero[5];

                $valor = mktime($relacion['H'],$relacion['i'],$relacion['s'],$relacion['n'],$relacion['j'],$relacion['Y']);

        }

        $ht = time()-$valor;
		   
       if($ht>=2116800)
        {
            $dia = date('d',$valor);
            $mes = date('n',$valor);
            $año = date('Y',$valor);
            $hora = date('H',$valor);
            $minuto = date('i',$valor);
            $mesarray = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
            $fecha = "El $día de $mesarray[$mes] del $año";
        }
        if($ht<30242054.045)
        {
           $hc=round($ht/2629743.83);if($hc>1){$s="es";}$fecha="Hace $hc mes".$s;
        }
        if($ht<2116800)
        {
           $hc=round($ht/604800);if($hc>1){$s="s";}$fecha="Hace $hc semana".$s;
        }
        if($ht<561600)
        {
           $hc=round($ht/86400);if($hc==1){$fecha="Ayer";}if($hc==2){$fecha="Hace 2 d&iacute;as";}if($hc>2)$fecha="Hace $hc d&iacute;as";
        }
        if($ht<84600)
        {
           $hc=round($ht/3600);if($hc>1){$s="s";}$fecha="Hace $hc hora".$s;if($ht>4200 && $ht<5400){$fecha="Hace m&aacute;s de una hora";}}
        if($ht<3570)
        {
           $hc=round($ht/60);if($hc>1){$s="s";}$fecha="Hace $hc minuto".$s;
        }
        if($ht<60)
        {
           $fecha="Hace $ht segundos";
        }
        if($ht<=3)
        {
           $fecha="Ahora mismo";
        }
        
        return $fecha;

    }

    #funcion para mostrar fecha actual en codigo
    function timeD()
    {
        $numero = mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
        return $numero;
    }

    #Funcion para encriptar las contraseña (maxima seguridad)
    function SLS4($encript) 
    {
        $special = htmlspecialchars($encript);
        $base = base64_encode($special);
        $entities = htmlentities($base);
        $md = md5($entities);
        $sha = sha1($md);
        $asl = addslashes($sha);
        $convert = convert_uuencode($asl);

        return $convert;
    }

    function Developed($var)
    {
        $user = $var;
        $devp = 'AcidMonkey';
        if($user != $devp)
        {
            exit;
        }
    }

    #Funcion para limpiar las ID de busqueda
    function SLS2($var)
    {
        if(is_numeric($var))
        {
            return $var;
        }
        else
        {
            $var        =   ereg_replace("[^0-9]", "", $var); 
            return $var;
        }
    }

    #Funcion para declarar correctamente un articulo
    function ART($var)
    {
        $var    =   nl2br($var);
        return $var;
    }
	

    #Funcion para actualizar la pagina
    function Refresh()
    {
        echo '<meta http-equiv="Refresh" content="1;url=">';
    }

    #Funcion para buscar datos de usuario mediante ID obtenida
    function userD($varID,$varW)
    {
        $usID       =   $varID;
        $Were       =   $varW;

        $useW       =   MYSQL_::Bits("SELECT * FROM users_news WHERE id = '$usID' ");
        $usW        =   mysqli_fetch_assoc($useW);

        return $usW[$Were];
    }

    #Funcion para reedirigir a una pagina especial
    function gO($dir,$time)
    {
        echo '<meta http-equiv="Refresh" content="'.$time.';url='.$dir.'">';
    }

    #Funcion para obtener nombre de rango por usuario
    function userR($var)
    {
        $usID       =   $var;

        $usbusq     =   MYSQL_::Bits("SELECT * FROM users_news WHERE id = '$usID' ");
        $usB        =   mysqli_fetch_assoc($usbusq);

        $usrank     =   $usB['rank'];

        //Buscamos ahora el nombre del rango
        $rankbusq   =   MYSQL_::Bits("SELECT * FROM users_rank WHERE rank = '$usrank' ");
        $rankB      =   mysqli_fetch_assoc($rankbusq);

        $namerank   =   $rankB['name'];
        return $namerank;
    }

?>