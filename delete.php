<?php
require './ManagerEmploye.php';
$supp= new ManagerEmploye();
$idemp= (int) $_GET['supprimer'];
$supp->Delete($idemp);
header("Location:./list.php");
?>