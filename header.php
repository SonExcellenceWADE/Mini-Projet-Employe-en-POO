<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Employe v2.0</title>
  </head>
  <body class="bg-light">
    <div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-info p-4">
      <h5 class="text-white h2"><a href="index.php" class="nav-link "> <p>Creer un nouvel employe </p></a></h5>
      <h5 class="text-white h2"><a href="list.php" class="nav-link" > <p>Liste des Employes </p></a></h5>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-info">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="index.php" > <p>Creer un nouvel employe </p> </a>
  </li>
    <li class="nav-item"> <a href="list.php" class="nav-link" > <p> Liste des Employes </p></a>
    </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher sur Google" aria-label="Search" name="search">
      <input type="submit" class="btn btn-outline-primary my-2 my-sm-0" name="search" value="Search" >
    </form>
  </nav>
  
</div>

<?php
if (isset($_POST['search'])) {
  header("Location:https://www.google.com&search=".$_GET['search']);
}
?>
