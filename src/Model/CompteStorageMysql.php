<?php
require_once('CompteStorage.php');
class CompteStorageMysql implements CompteStorage{

    private $bd;

    public function __construct(PDO $bd){
      $this->bd = $bd;
    }

    public function getbd(){
      return $this->bd;
    }

    public function create(Compte $c){
      $req=$this->bd->prepare("INSERT INTO user(nom,genre,password,mode,mob_mail) VALUES(:nom,:genre,:password,:mode,:mob_mail)");
      $req->bindParam(":nom",$nom);
      $req->bindParam(":genre",$genre);
      $req->bindParam(":mob_mail",$mob_mail);
      $req->bindParam(":password",$pass);
      $req->bindParam(":mode",$mode);

      $nom= $c->getnom();
      $genre = $c->getgenre();
      $mob_mail = $c->getmob_email();
      $pass = $c->getpass();
      $mode = $c->getmode();

      $req->execute();
    }

    // Récuperer les utilisateur qu'on a dans la base de donne pour la verification d'authetification et d'inscription(login)
    public function readUser(){
      $req = "SELECT * FROM user";
      $stmt = $this->bd->prepare($req);
      $data = array();
      $stmt->execute($data);
      $res = $stmt->fetchAll();
      $n = array(0=> new Compte($res[0][1],$res[0][2],$res[0][3],$res[0][4],$res[0][5]));

      for($i = 1; $i <count($res); $i++){
        $b = array($i =>new Compte($res[$i][1],$res[$i][2],$res[$i][3],$res[$i][4],$res[$i][5]));
        $n = $n+$b;
      }

      return $n;
    }
  }





?>
