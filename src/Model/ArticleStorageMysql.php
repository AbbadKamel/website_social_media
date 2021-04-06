<?php
require_once("ArticleStorage.php");
class ArticleStorageMysql implements ArticleStorage{
  private $bd;

  public function __construct(PDO $bd){
    $this->bd=$bd;
  }

  public function getbd(){
    return $this->bd;
  }
  public function createArticle(Article $a,$login){
    $req = $this->bd->prepare("INSERT INTO Articles(content,location,login,date_creation) VALUES(:article,:location,:login,:date_creation)");
    $req->bindParam(':article',$ar);
    $ar = $a->getArticle();
    $req->bindParam(":location",$loc);
    $loc = $a->getLocation();
    $req->bindParam(":login",$login);
    $req->bindParam(":date_creation",$dt);
    $dt = $a->getDateCreation();

    $req->execute();

  }

  public function readAllArticle(){
    $req= "SELECT * from Articles order by date_creation";
    $st= $this->bd->prepare($req);
    $data = array();
    $st->execute($data);
    $res=$st->fetchAll();
    $donne1=array();

    for($i=0;$i<count($res);$i++){
      $donne2 = array($res[$i][0]=> new Article($res[$i][1],$res[$i][2],$res[$i][3],$res[$i][4]));
      $donne1 = $donne1+$donne2;
    }
    return $donne1;
  }

  public function deleteArticleBD($id){
    $req=$this->bd->prepare("DELETE FROM Articles WHERE id=".$id);
    $req->execute();
  }


}
?>
