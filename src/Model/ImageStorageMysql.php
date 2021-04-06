<?php
require_once("ImageStorage.php");
class ImageStorageMysql implements ImageStorage{
  private $bd;

  public function __construct(PDO $bd){
    $this->bd=$bd;
  }

  public function getbd(){
    return $this->bd;
  }
  public function createImage(Image $i,$login){
    $req = $this->bd->prepare("INSERT INTO image(lien,location,login,date_creation) VALUES(:lien,:location,:login,:date_creation)");
    $req->bindParam(':lien',$img);
    $img = $i->getLien();
    $req->bindParam(":location",$loc);
    $loc = $i->getLocation();
    $req->bindParam(":login",$login);
    $req->bindParam(":date_creation",$dt);
    $dt = $i->getDateCreation();

    $req->execute();

  }

  public function readAllImage(){
    $req= "SELECT * from image order by date_creation";
    $st= $this->bd->prepare($req);
    $data = array();
    $st->execute($data);
    $res=$st->fetchAll();
    $donne1=array();

    for($i=0;$i<count($res);$i++){
      $donne2 = array($res[$i][0]=> new Image($res[$i][1],$res[$i][2],$res[$i][3],$res[$i][4]));
      $donne1 = $donne1+$donne2;
    }
    return $donne1;
  }

  public function deleteImageBD($id){
    $req=$this->bd->prepare("DELETE FROM image WHERE id=".$id);
    $req->execute();
  }


}
?>
