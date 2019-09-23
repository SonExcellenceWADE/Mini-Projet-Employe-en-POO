<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './Employe.php';
require './header.php';
require './ManagerEmploye.php';
$modif= new ManagerEmploye();

$idemp= (int) $_GET['editer'];
$tabmodif=$modif->recupid($idemp);

$manager= new ManagerEmploye();
//Ajout d'un employer apres verification
if(isset($_POST['modifier'])) {
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

    $manager->Edit($emp, $idemp);
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
<h2>Formulaire de Modification de l'Employe</h2>
    
</div>
<div class="card-body"> </div>
<?php if(!empty($msg)):?>
<div class="alert alert-success">
    <?= $msg; ?>
</div>
<?php endif ?>
<?php if(!empty($error)):?>
<div class="alert  alert-danger">
    <?= $error; ?>
</div>
<?php endif ?>
<form action="" method="POST">
<span> *: Champs obligatoires </span>
<div class="col-lg-6">
<div class="form-group">
    
    <label for="mat">Matricule</label>
    <input type="text" name="mat" id="mat" class="form-control" readonly="true" value="<?php echo $tabmodif->mat  ?>" >
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="pnom">Prenom<span> *</span></label>
    <input type="text" name="pnom" id="pnom" class="form-control" value="<?php echo $tabmodif->pnom  ?>" required>
    <small> <span> <?php if(!empty($erreur['pnom'])) echo $erreur['pnom']?> </span> </small> <br/>
    <small> <span> <?php if(!empty($erreur['prenom'])) echo $erreur['prenom']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="nom">Nom<span> *</span></label>
    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $tabmodif->nom  ?>" required >
    <small> <span> <?php if(!empty($erreur['nom'])) echo $erreur['nom']?> </span> </small> <br/>
    <small> <span> <?php if(!empty($erreur['nomtxt'])) echo $erreur['nomtxt'] ?></span></small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="sexe">Sexe <span> *</span></label>
    <input type="radio" name="sexe" id="sexe"  value="<?php echo $tabmodif->sexe  ?>" required> Masculin
    <input type="radio" name="sexe" id="sexe" value="<?php echo $tabmodif->sexe  ?>" required> Feminin <br/>
    <small> <span> <?php if(!empty($erreur['sexe'])) echo $erreur['sexe']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label for="special"> Specialite<span> *</span> </label>
    <select name="specialite" id="special" class="form-control" value="<?php echo $tabmodif->specialite  ?>" required>
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
    <input type="text" name="sal" id="sal" class="form-control"  value="<?php echo $tabmodif->sal  ?>" required >
    <small> <span> <?php if(!empty($erreur['sal'])) echo $erreur['sal']?> </span> </small> <br/> 
        <small> <span> <?php if(!empty($erreur['salaire'])) echo $erreur['salaire']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="datenais">Date de Naissance</label>
    <input type="date" name="datenais" id="datenais" class="form-control" value="<?php echo $tabmodif->datenais  ?>" required minlength="10" maxlength="10">
    <small> <span> <?php if(!empty($erreur['datenais'])) echo $erreur['datenais']?> </span> </small> <br/>
     <small> <span> <?php if(!empty($erreur['datevalid'])) echo $erreur['datevalid']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="email">Email<span> *</span></label>
    <input type="text" name="email" id="email" class="form-control" value="<?php echo $tabmodif->email  ?>" required>
    <small> <span> <?php if(!empty($erreur['email'])) echo $erreur['email']?> </span> </small> <br/> 
    <small> <span> <?php if(!empty($erreur['mail'])) echo $erreur['mail']?> </span> </small> 
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label for="tel">Telephone<span> *</span></label>
    <input type="text" name="tel" id="tel" class="form-control" value="<?php echo $tabmodif->tel  ?>" required>
    <small> <span> <?php if(!empty($erreur['tel'])) echo $erreur['tel']?> </span> </small> <br/> 
        <small> <span> <?php if(!empty($erreur['sizetel'])) echo $erreur['sizetel']?> </span> </small> <br/> 
        <small> <span> <?php if(!empty($erreur['optel'])) echo $erreur['optel']?> </span> </small>
</div>
</div>
<div class="from-group">
    <input type="submit" value="Modifier" name="modifier" class="btn btn-info">
</div>


</form>

</div>

</div>

<?php require('./footer.php');    ?>



