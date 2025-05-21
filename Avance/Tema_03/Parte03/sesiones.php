<?php session_start(); 
if(isset($_SESSION['contador'])){
    $_SESSION['contador']++;
}else{
    $_SESSION['contador'] = 1;
}
echo "Usted entro a la pagina ".$_SESSION['contador']." veces";
?>