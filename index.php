<?php 
require('./header.php');   
error_reporting(E_ALL);
ini_set('display_errors', 1);

require './Employe.php';
require './ManagerEmploye.php';
$manager= new ManagerEmploye();
//Ajout d'un employer apres verification
if(isset($_POST['ajouter'])) {
    $erreur=array(); //tableau contenant les erreus de saisie du formulaire
 
    //Controle de saisie du champ prenom
   if(empty($_POST['pnom']) )
   {
   # code...
   $erreur['pnom']= "Veuillez remplir ce champ vide <br/>";
   
   }
   if(is_numeric($_POST['pnom'] )){
      $erreur['prenom']="Ce champ doit etre de type texte";
   }
   trim($_POST['pnom'],"\t\n\r\0\x0B\,");//permet de supprimer des caracteres speciaux 
   //comme l'espace, tabulation, rerour a la lign, null, etc...
   if( empty($_POST['nom']))
   
   {
   # code...
   $erreur['nom']= " Verifier le champ de saissie  de votre nom<br/>";
   
   }
   if(is_numeric($_POST['nom'] )){
    $erreur['nomtxt']="Ce champ doit etre de type texte";
 }
   trim($_POST['nom'],"\t\n\r\0\x0B\,");//permet de supprimer des caracteres speciaux 
   //comme l'espace, tabulation, rerour a la lign, null, etc...
 
   if(empty($_POST['sexe'])){
       $erreur['sexe']="Veuillez cocher un sexe";
   }
   
   if(empty($_POST['specialite']) || $_POST['specialite']=="neant"){
       $erreur['specialite']="Veuillez selectionner un departement";
   }
   
 
   if (empty($_POST['datenais']) ) {
   # code...
   $erreur['datenais']=" Votre date de naissance  ne doit pas etre vide";
   }
   trim($_POST['datenais']);//permet de supprimer des caracteres speciaux 
   //comme l'espace, tabulation, rerour a la lign, null, etc...
   /* $datevalid=$_POST['datenais'];
   $form="%d/%m/%Y";
   if (!strptime($datevalid, $form)) {
      $erreur['datevalid']="Ce format de date n'est pas valide";
   } */
   if( empty($_POST['sal'])  ||  !is_numeric($_POST['sal']))
   
   {
   # code...
   $erreur['sal']= " Votre salaire ne doit pas etre ni une chaine de caractéres ni vide <br/>";
   
   }elseif ($_POST['sal']>=75000 && $_POST['sal']<=1000000) {
   # code..
   //Votre salaire est compris entre [75000, 1000000]
   
   }else {
   # code...
   $erreur['salaire']= "Votre salaire doit etre compris entre [75000, 1000000]";
   }
   trim($_POST['sal']);  
   
   if(!empty($_POST['tel'])){
        if( !is_numeric($_POST['tel']))
    
        {
        # code...
    
        $erreur['tel']= " Votre numero de telephone ne doit pas etre ni une chaine de caractéres ni vide <br/>";
        
        }
        if (strlen($_POST['tel'])!=9 )  {
        # code...
        $erreur['sizetel']="Votre numero de telephone ne doit comporter que de 09 chiffres";
        }
        if ($_POST['tel'][0]!='7' || ($_POST['tel'][1]!='0' && $_POST['tel'][1]!='6' && $_POST['tel'][1]!='7' && $_POST['tel'][1]!='8')) {
        # code...
        $erreur['optel']="Votre numero de telephone doit etre commencé par 70 ou 76 ou 77 ou 78";
        }
   }else{
    $erreur['tel']= " Votre telephone est incorrect ou n'est pas valide <br/>";
 
   }
   
   
   
   //Controle de saisie sur le champ de saisie Email
 if (!preg_match('#^[a-zA-Z0-9]+[\w.-]*@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', htmlspecialchars($_POST['email'])) )
 {
    # code...
    $erreur['email']=" Votre email est incorrect ou n'est pas valide <br/>";
 
 }
 
   
   if(empty($_POST['email'])){
    $erreur['mail']=" Veuillez remplir ce champ vide <br/>";
       
   }
   //recupere le nombre d'erreur du tableau erreur
   if(count($erreur) != 0 ){
   $erreur['vide']  = '';
   }else{
/* $emp= new Employe(array(
'mat'=>trim($_POST['mat'],' '),
'pnom'=>trim($_POST['pnom'],' '),
'nom'=>trim($_POST['nom'],' '),
'sexe'=>trim($_POST['sexe'], ' '),
'specialite'=>trim($_POST['specialite'],' '),
'sal'=>trim($_POST['sal'],' '),
'datenais'=>trim($_POST['datenais'],' '),
'email'=>trim($_POST['email'],' '),
'tel'=>trim($_POST['tel'], ' ')
)); */
$emp= new Employe();
$emp->setMat(trim($_POST['mat']), ' ');
$emp->setPnom(trim($_POST['pnom']), ' ');
$emp->setNom(trim($_POST['nom']), ' ');
$emp->setSexe(trim($_POST['sexe']), ' ');
$emp->setSpecialite(trim($_POST['specialite']),' ');
$emp->setSal(trim($_POST['sal']));
$emp->setDatenais(trim($_POST['datenais']), ' ');
$emp->setEmail(trim($_POST['email']), ' ');
$emp->setTel(trim($_POST['tel']), ' ');
$manager->Add($emp);
}

}
?>



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
    
    </h6>
<h2>Formulaire d'enregistrement employe</h2>
    
</div>
<div class="card-body"> </div>

<form action="" method="POST">

<input  type="search" class="col-lg-4" class="form-control" name="mat" placeholder="Rechercher un employe avec son matricule">
<input type="submit"  name="rechercher" class="btn btn-outline-info my-2 my-sm-0" value="Rechercher">

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
  if(isset($_POST['rechercher']) && !empty($_POST['rechercher'])) {
      
      if(empty($_POST['mat']) || is_numeric($_POST['mat']) ){
          echo " <span> Ooops:) Ce matricule n'existe pas ou n'est pas valide... </span>";
      }else{
   $emp= new Employe();
    $emp->setMat($_POST['mat']);
$search=$manager->Recherche($emp);
?>
    
<td> <?= $search->mat; ?> </td>
<td> <?= $search->pnom; ?> </td>
<td> <?= $search->nom; ?> </td>
<td> <?= $search->sexe; ?> </td>
<td> <?= $search->specialite; ?> </td>
<td> <?= $search->sal; ?> </td>
<td> <?= $search->datenais; ?> </td>
<td> <?= $search->email; ?> </td>
<td> <?= $search->tel; ?> </td>
<td> <a href="edite.php?editer=<?= $search->idemp ?>" class="btn btn-info"  >Modifier</a>  </td>
<td>  <a href="delete.php?supprimer=<?= $search->idemp ?>"  class="btn btn-danger"  onclick="return confirm('Etes vous sur de vouloir Supprimer cet employer n°: <?= $search->idemp ?> ?')" >Supprimer</a></td>
</tr>

    <?php } } ?>
</table>
</div>
 </div> 

</form>
<form action="" method="POST">
<span> *: Champs obligatoires </span>
<div class="col-lg-6">
<div class="form-group">
    
    <label for="mat">Matricule</label>
    <input type="text" name="mat" id="mat" class="form-control" readonly="true" value=" EM-<?php echo $manager->Automat() ?>" >
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="pnom">Prenom<span> *</span></label>
    <input type="text" name="pnom" id="pnom" class="form-control" placeholder="Entrer votre Prenom" required>
    <small> <span> <?php if(!empty($erreur['pnom'])) echo $erreur['pnom']?> </span> </small> <br/>
    <small> <span> <?php if(!empty($erreur['prenom'])) echo $erreur['prenom']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="nom">Nom<span> *</span></label>
    <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrer votre Nom" required >
    <small> <span> <?php if(!empty($erreur['nom'])) echo $erreur['nom']?> </span> </small> <br/>
    <small> <span> <?php if(!empty($erreur['nomtxt'])) echo $erreur['nomtxt'] ?></span></small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="sexe">Sexe <span> *</span></label>
    <input type="radio" name="sexe" id="sexe"  value="Masculin" required> Masculin
    <input type="radio" name="sexe" id="sexe" value="Feminin" required> Feminin <br/>
    <small> <span> <?php if(!empty($erreur['sexe'])) echo $erreur['sexe']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label for="special"> Specialite<span> *</span> </label>
    <select name="specialite" id="special" class="form-control" required>
    <option value="neant">------------------------------------------------------------------------------------------</option>
    <option value="Developpement web / Mobile">Developpement Web/ Mobile</option>
        <option value="Reference digital">Reference digital</option>
        <option value="Data artisan">Data Artisan</option>
        <option value="Administration Reseaux">Administration Reseaux </option>
       <option value="Intelligence artificiel">Intelligence Artificiel</option>
    </select>
    <small> <span> <?php if(!empty($erreur['specialite'])) echo $erreur['specialite']?> </span> </small>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="sal">Salaire <span> *</span></label>
    <input type="text" name="sal" id="sal" class="form-control"  placeholder="Entrer votre Salaire" required >
    <small> <span> <?php if(!empty($erreur['sal'])) echo $erreur['sal']?> </span> </small> <br/> 
        <small> <span> <?php if(!empty($erreur['salaire'])) echo $erreur['salaire']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="datenais">Date de Naissance</label>
    <input type="date" name="datenais" id="datenais" class="form-control" placeholder="Entrer votre Date de naissance" required minlength="10" maxlength="10">
    <small> <span> <?php if(!empty($erreur['datenais'])) echo $erreur['datenais']?> </span> </small> <br/>
     <small> <span> <?php if(!empty($erreur['datevalid'])) echo $erreur['datevalid']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="email">Email<span> *</span></label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Entrer votre Email" required>
    <small> <span> <?php if(!empty($erreur['email'])) echo $erreur['email']?> </span> </small> <br/> 
    <small> <span> <?php if(!empty($erreur['mail'])) echo $erreur['mail']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="tel">Telephone<span> *</span></label>
    <input type="text" name="tel" id="tel" class="form-control" placeholder="Entrer votre Telephone" required>
    <small> <span> <?php if(!empty($erreur['tel'])) echo $erreur['tel']?> </span> </small> <br/> 
        <small> <span> <?php if(!empty($erreur['sizetel'])) echo $erreur['sizetel']?> </span> </small> <br/> 
        <small> <span> <?php if(!empty($erreur['optel'])) echo $erreur['optel']?> </span> </small>
</div>
</div>
<div class="from-group">
    <input type="submit" value="Ajouter" name="ajouter" class="btn btn-info">
</div>


</form>

</div>

</div>

<?php require('./footer.php');    ?>