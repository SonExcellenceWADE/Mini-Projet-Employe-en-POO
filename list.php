<?php require('./header.php');   

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php require './ManagerEmploye.php'; ?>
     <div class="container">
<div class="card mt-5">
    <div class="card-header">
    <style>
    span{
        color: red;
    }
    font{
        background-color:   #148f77  ;
        color: #ffff;
    }
        
</style>
    </head>
    <body>
      <div class="card mb-3" style="max-width:10%;">

      <img src="./sonatel.png" class="card-img" alt="..." height="90px" >
      <marquee direction="left"> <font> Coding for better life... </font> </marquee>
    </div>
   
    <h6 class="card-title">
Prenom: Abdoulaye <br/>
Nom:     WADE  <br/>
Profession: Apprenant Développement Web/Mobile Online <br/>
Institut:   Sonatel Academy 
<div class="card-header">
    <h2>Liste des employes enregistres</h2> 

</div>
 <div class="card-body">
     <div class="table-responsive">
<table class="table table-sm"> 
    <thead>
    <tr>
        <th>Matricule</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Specialite</th>
        <th >Salaire</th>
        <th>Date Naissance</th>
        <th>Email</th>
        <th  colspan="2px">Telephone</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php
    $manager= new ManagerEmploye();
    $manager->ListEmp();
    ?>
    <?php foreach ( $manager->ListEmp() as $employe): ?>
<td> <?= $employe->mat; ?> </td>
<td> <?= $employe->pnom; ?> </td>
<td> <?= $employe->nom; ?> </td>
<td> <?= $employe->sexe; ?> </td>
<td> <?= $employe->specialite; ?> </td>
<td> <?= $employe->sal; ?> </td>
<td> <?= $employe->datenais; ?> </td>
<td> <?= $employe->email; ?> </td>
<td> <?= $employe->tel; ?> </td>
<td> <a href="edite.php?editer=<?= $employe->idemp ?>" class="btn btn-info"  >Modifier</a>  </td>
<td>  <a href="delete.php?supprimer=<?= $employe->idemp ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer cet employer n°: <?= $employe->idemp ?> ?')" >Supprimer</a></td>
</tr>
<?php endforeach ?>
</table>
</div>
 </div> 
</form>

</div>

</div>

<?php require('./footer.php');    ?>