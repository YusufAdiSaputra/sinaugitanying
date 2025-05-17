<?php
  include "Assets/Layout/UrlAssets.php";
  if(empty($_SESSION['Admin']['Email'])){
    header("location:Views/Data");
  }
?>


