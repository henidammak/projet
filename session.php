<?php 
  session_start();
  $ses=$_SESSION['cin_inspecteur'];
  echo "<script>console.log($ses) </script>";
  if(!isset($_SESSION['cin_inspecteur']))
  {
    header("location:index.php"); 
    
  }
?>