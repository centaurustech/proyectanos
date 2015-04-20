<?php 

	function sON()
	{
		if($_SESSION['ID'] == TRUE)
		{
			Headers(Site."/index.php?sessionactive");
		}
	}

	function sOF()
	{
		if($_SESSION['ID'] == FALSE)
		{
			Headers(Site."/index.php?nosession");
		}
	}

?>