<?php

class Employe   {
   
    private $idemp, $mat, $pnom, $nom, $sexe, $specialite, $sal;
    private $datenais, $email, $tel;


    //function de constructeur
   /*  public function __construct(array $data)
    {
       $this->hydrate($data); 
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method= 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    } */
    //les getters
    public function getIdemp(){ return $this->idemp;}
    public function getMat(){ return $this->mat;}
    public function getPnom(){return $this->pnom;}
    public function getNom(){return $this->nom;}
    public function getSexe(){return $this->sexe;}
    public function getSpecialite(){return $this->specialite;}
    public function getSal(){return $this->sal;}
    public function getDatenais(){return $this->datenais;}
    public function getEmail(){return $this->email;}
    public function getTel(){return $this->tel;}

    //les setters
    public function setMat($mat){$this->mat=$mat; return $this->mat;}
    public function setPnom($pnom){$this->pnom=$pnom; return $this->pnom;}
    public function setNom($nom){$this->nom=$nom; return $this->nom;}
    public function setSexe($sexe){$this->sexe=$sexe; return $this->sexe;}
    public function setSpecialite($specialite){$this->specialite=$specialite; return $this->specialite;}
    public function setSal($sal){$this->sal=$sal; return $this->sal;}
    public function setDatenais($datenais){$this->datenais=$datenais; return $this->datenais;}
    public function setEmail($email){$this->email=$email; return $this->email;}
    public function setTel($tel){$this->tel=$tel; return $this->tel;}
}