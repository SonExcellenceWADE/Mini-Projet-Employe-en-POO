<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './connexion.php';
class ManagerEmploye{

    private $con;

    //le constructeur avec comme argument la variable de connexion
    public function  __construct()
    {
        $this->con=connect();
    }
public function Add(Employe $emp){
    $req= $this->con->prepare('INSERT INTO employe SET mat=:mat, pnom=:pnom, nom=:nom,
    sexe=:sexe, specialite=:specialite, sal=:sal, datenais=:datenais, email=:email, tel=:tel');
    $req->bindValue(':mat', $emp->getMat(),PDO::PARAM_STR);
    $req->bindValue(':pnom', $emp->getPnom(), PDO::PARAM_STR);
    $req->bindValue(':nom', $emp->getNom(), PDO::PARAM_STR);
    $req->bindValue(':sexe', $emp->getSexe(), PDO::PARAM_STR);
    $req->bindValue(':specialite', $emp->getSpecialite(), PDO::PARAM_STR);
    $req->bindValue(':sal', $emp->getSal(), PDO::PARAM_STR);
    $req->bindValue(':datenais', $emp->getDatenais(), PDO::PARAM_STR);
    $req->bindValue(':email', $emp->getEmail(), PDO::PARAM_STR);
    $req->bindValue(':tel', $emp->getTel(), PDO::PARAM_STR);
   $req->execute();
if ($req->execute()) {
       echo "Employe ajoute avec succes";
   }else{
       echo "Erreur ajout employe";
   }
  
}
//fonction generation automatique du matricule
public function Automat(){
     $req=$this->con->prepare("SELECT COUNT(*) FROM employe");
    $req->execute();
    $nbline=$req->fetchColumn();
    $nbline+=1;
    $result=sprintf("%04d", $nbline);
    return $result; 
    
}
 public function ListEmp()
{
    
    $req=$this->con->prepare("SELECT * FROM employe");
    $req->execute();
    $tab=$req->fetchAll(PDO::FETCH_OBJ);
    return $tab;
}
public function Delete($idemp){
    $this->con->exec('DELETE FROM employe WHERE idemp='.$idemp);
return $idemp;

}
public function Edit(Employe $emp, $idemp){
    $req= $this->con->prepare('UPDATE employe SET mat=:mat, pnom=:pnom, nom=:nom,
    sexe=:sexe, specialite=:specialite, sal=:sal, datenais=:datenais, email=:email, tel=:tel
    WHERE idemp='.$idemp);
    $req->bindValue(':mat', $emp->getMat());
    $req->bindValue(':pnom', $emp->getPnom());
    $req->bindValue(':nom', $emp->getNom());
    $req->bindValue(':sexe', $emp->getSexe());
    $req->bindValue(':specialite', $emp->getSpecialite());
    $req->bindValue(':sal', $emp->getSal());
    $req->bindValue(':datenais', $emp->getDatenais());
    $req->bindValue(':email', $emp->getEmail());
    $req->bindValue(':tel', $emp->getTel());
   
   $req->execute();
if ($req->execute()) {
       echo "Employe modifie avec succes";
       header("Location:./list.php");
   }else{
       echo "Erreur modification employe";
   }
}

public function recupid($idemp){
    $req=$this->con->query("SELECT * FROM employe WHERE idemp=".$idemp);
    $tab=$req->fetch(PDO::FETCH_OBJ); //tableau d'employe a modifier
    return $tab;
}

public function Recherche(Employe $emp)
{
  $sql="SELECT * FROM employe WHERE mat=:mat";
   $req=$this->con->prepare($sql);
   $req->execute([':mat'=>$emp->getMat()]);
    $tab=$req->fetch(PDO::FETCH_OBJ);
    return $tab;
}
}