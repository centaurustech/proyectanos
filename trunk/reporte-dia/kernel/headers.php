<?php 
	function Headers($header)
	{
		header("location: ".$header."");
	}

    function Alertas($var1,$var2)
    {
        $tipo   =   $var1;
        $text   =   $var2;
        echo '<div id="Alerta"><div class="Alerta '.$tipo.'"><span onclick="document.getElementById(\'Alerta\').style.display = \'none\'">X</span>'.$text.'</div></div> ';
    }

    function onSES()
    {
        if($_SESSION == TRUE)
        {
            Headers(Site.'/index.php');
        }
    }

    function ofSES()
    {
        if($_SESSION == FALSE)
        {
            Headers(Site.'/login.php');
        }
    }
?>