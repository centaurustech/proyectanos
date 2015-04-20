<?php

function securesql1($securesql){

  $securesql = str_replace("'","",strtolower($securesql));
  $securesql = str_replace(";","",strtolower($securesql));
  $securesql = str_replace("|","",strtolower($securesql));
  $securesql = str_replace("drop","",strtolower($securesql));
  $securesql = str_replace("select","",strtolower($securesql));
  $securesql = str_replace("update","",strtolower($securesql));
  $securesql = str_replace("delete","",strtolower($securesql));
  $securesql = str_replace("--","",strtolower($securesql));
  $securesql = str_replace("`","",strtolower($securesql));
  $securesql = str_replace("�","",strtolower($securesql));
  $securesql = str_replace("insert","",strtolower($securesql));
  $securesql = str_replace("xp_","",strtolower($securesql));
  $securesql = str_replace("select","",strtolower($securesql));
  $securesql = str_replace("create","",strtolower($securesql));
  $securesql = str_replace("sp_","",strtolower($securesql));
  $securesql = str_replace("<","",strtolower($securesql));
  $securesql = str_replace(">","",strtolower($securesql));

return $securesql;
}

function secureword($secureword){

  $secureword = str_replace("'","",strtolower($secureword));
  $secureword = str_replace(";","",strtolower($secureword));
  $secureword = str_replace("|","",strtolower($secureword));
  $secureword = str_replace("<script>","",strtolower($secureword));
  $secureword = str_replace("<","",strtolower($secureword));
  $secureword = str_replace(">","",strtolower($secureword));
  $secureword = str_replace("<div>","",strtolower($secureword));
  $secureword = str_replace("</script>","",strtolower($secureword));
  $secureword = str_replace("</div>","",strtolower($secureword));
  $secureword = str_replace("<iframe>","",strtolower($secureword));
  $secureword = str_replace("</iframe>","",strtolower($secureword));
  $secureword = str_replace("iframe","",strtolower($secureword));



return $secureword;

}


function limpia($var){   
$malo = array("\\","/",";","\'","<",">","'",":"); 
$i=0;$o=count($malo);
	while($i<=$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
return $var;}

function limpiaextranios($var){   
$malo = array("\\","/",";","\'","<",">","'",":","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�","�"); 
$i=0;$o=count($malo);
	while($i<=$o){
		$var = str_replace($malo[$i],"",$var);
		$i++;
	}
return $var;}

?>