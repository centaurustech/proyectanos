<?php 
	
	//Registro de usuario
	if(isset($_POST['agregar_encuesta'])){
		//Limpiamos variables
		$id_respuesta = $_POST['id_respuesta'];
		$P1 = $_POST['P1'];
		/*$P2 = SLS3($_POST['P2']);
		$P3 = SLS3($_POST['P3']);
		$P4 = SLS3($_POST['P4']);
		$P5 = SLS3($_POST['P5']);
		$P6 = SLS3($_POST['P6']);
		$P7 = SLS3($_POST['P7']);
		$P8 = SLS3($_POST['P8']);
		$P9 = SLS3($_POST['P9']);
		$P10 = SLS3($_POST['P10']);
		$P11 = SLS3($_POST['P11']);
		$P12 = SLS3($_POST['P12']);
		$P13 = SLS3($_POST['P13']);
		$P14 = SLS3($_POST['P14']);
		$P15 = SLS3($_POST['P15']);
		$P16 = SLS3($_POST['P16']);
		$P17 = SLS3($_POST['P17']);
		$P18 = SLS3($_POST['P18']);
		$P19 = SLS3($_POST['P19']);
		$P20 = SLS3($_POST['P20']);
		$resultado = SLS3($_POST['resultado']);*/
	
		//Establecemos datos privados
		//$usip = iP();
		$dreg = timeD();


//$encuestaAdd = MYSQL_::Bits("INSERT INTO puntaje (id_respuesta,P1,day_reg) VALUES ('$id_respuesta','$P1','$dreg')");
//gO(''.Site.'/index.php?registed','1');
//Alertas('succes','Tu cuenta ha sido creada con éxito en '.BN('title').' como '.$user.'');
		//Verificamos que no se dejen campos vacios
		if($P1 == NULL || $id_respuesta == NULL) {
			Alertas('dangers','hay campos vacios');
		
		} else {
			//Si no existen campos vacios & verificamos que no exista otro nombre de usuario igual
			$idComp = MYSQL_::Bits("SELECT * FROM puntaje");
			$idC 	  = mysqli_fetch_assoc($idComp);
			
		if($id_respuesta == $idC['id_respuesta']) {
				
			Alertas('dangers','este id ya existe');
			
		}else {
				
		
$encuestaAdd = MYSQL_::Bits("INSERT INTO puntaje (id_respuesta,P1,P2,P3,P4,P5,P6,P7,P8,P9,P10,P11,P12,P13,P14,P15,P16,P17,P18,P19,P20,resultado,day_reg) 
VALUES ('$id_respuesta','$P1','$P2','$P3','$P4','$P5','$P6','$P7','$P8','$P9','$P10','$P11','$P12','$P13','$P14','$P15','$P16','$P17','$P18','$P19','$P20','$reultado','$dreg') ");
				
				Alertas('succes','Tu cuenta ha sido creada con éxito en '.BN('title').' como '.$id_respuesta.'');
				//Reedireccionamos al usuario
				//gO(''.Site.'/index.php?registed='.$use4.'','1');

				
			}
		}
	}

	


	


?>