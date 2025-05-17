<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$project    = explode("/",$_SERVER['SCRIPT_NAME']);
$UrlAssets = "http://$_SERVER[HTTP_HOST]/$project[1]/";



function redirect($url){
  echo "<script>window.location.href='".$url."'</script>";
}


?>



