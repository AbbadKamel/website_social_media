<?php
  require_once "src/Router.php";
  require_once "src/Model/Compte.php";
class ViewPrive extends ViewPublic{
  private $content_prive;
  private $compte;
  private $pub;

  public function __construct(Router $router,Compte $compte){
    $this->compte = $compte;
    $this->router = $router;
    $this->content_prive= null;

  }
  public function render(){
      $c=0;
      $menu="<a class='dropdown-item' href=#>ABOUT</a>
            <a class='dropdown-item' href=".$this->router->getDeconnecte().">Deconnecter</a>";
      $content=$this->content;
      $title= "PAGE PRIVE";
      $pub= $this->pub;
      $content_prive = $this->content_prive."<br>";
      include "template.php";

  }


    public function pagePrincipale(array $art,array $img){
$this->pub.="<div class='container-fluid gedf-wrapper'>";
$this->pub.="<div class='row'>";
$this->pub.="<div class='col-md-3'></div>  <div class='col-md-6 gedf-main'><div class='card gedf-card'>  <div class='card-header'>";
$this->pub.="<ul class='nav nav-tabs card-header-tabs' id='myTab' role='tablist'><li class='nav-item'>";
$this->pub.="<a class='nav-link active' id='posts-tab' data-toggle='tab' href='#posts' role='tab' aria-controls='posts' aria-selected='true'>Make a publication</a>";
$this->pub.="</li><li class='nav-item'><a class='nav-link' id='images-tab' data-toggle='tab' role='tab' aria-controls='images' href='#images'>Images</a>";
$this->pub.="</li></ul></div><div class='card-body'><div class='tab-content' id='myTabContent'>";

$this->pub.="<div class='tab-pane fade show active' id='posts' role='tabpanel' aria-labelledby='posts-tab'>";
$this->pub.="<div class='form-group'><label class='sr-only' for='message'>post</label><form action=".$this->router->addArticle()." method='POST'><textarea";
$this->pub.=" class='form-control' id='message' name=".ArticleBuilder::ARTICLE." rows='3' placeholder='What are you thinking?'></textarea><input type='text'";
$this->pub.="hidden name=".ArticleBuilder::LOCATION." value='Caen'><input type='date' hidden name='".ArticleBuilder::DATECREATION."' value=".date('Y-m-d H:i:s')."><br>";
$this->pub.="<button type='button' onclick='getCoordintes();'><img src='/projet_annuel/src/Style/images/map.png' style='width:30px;'>";
$this->pub.="<span id='myCity'></span></button>";
$this->pub.="<button type='submit' class='btn btn-primary'>Valider</button></form></div></div>";
$this->pub.="<div class='tab-pane fade' id='images' role='tabpanel' aria-labelledby='images-tab'>";
$this->pub.="<div class='form-group'>";

$this->pub.="<div class='custom-file'>";
$this->pub.="<form action=".$this->router->addImage()." method='POST'><input type='text' hidden name=".ArticleBuilder::LOCATION." value='Caen'>";
$this->pub.="<input type='file'  name='".ImageBuilder::LIEN."'><input type='date' hidden name='".ImageBuilder::DATECREATION."' value=".date('Y-m-d H:i:s').">";
$this->pub.="<button type='button' onclick='getCoordintes();'><img src='/projet_annuel/src/Style/images/map.png' style='width:30px;'><span id='myCity'></span></button>";
$this->pub.="<button type='submit' class='btn btn-primary'>Valider</button>";
$this->pub.="</form>";

$this->pub.="</div>";
$this->pub.="</div>";
$this->pub.="<div class='py-4'></div>";
$this->pub.="</div>";
$this->pub.="</div>";
$this->pub.="</div>";
$this->pub.="</div>";


$this->content.="<div class='card gedf-card'>";

if($art != null){

foreach ($art as $key => $value){

  $this->content.="<div class='card-header'>";
  $this->content.="<div class='d-flex justify-content-between align-items-center'>";
  $this->content.="<div class='d-flex justify-content-between align-items-center'>";
  $this->content.="<div class='mr-2'>";

$this->content.="<img class='rounded-circle' width='45' src='/projet_annuel/src/Style/images/profile.png' >";
$this->content.="</div>";
$this->content.="<div class='ml-2'>";
$this->content.="<div class='h5 m-0'>".$value->getLoginArticle()."</div>";
$this->content.=" <div class='h7 text-muted'><img src='/projet_annuel/src/Style/images/map.png' width=8% height=8%>".$value->getLocation()."</div>";
$this->content.="</div><div><div class='dropdown'><button class='btn btn-link dropdown-toggle' type='button' id='gedf-drop1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
$this->content.="<i class='fa fa-ellipsis-h'></i></button><div class='dropdown-menu dropdown-menu-right' aria-labelledby='gedf-drop1'><a class='dropdown-item' href='#'>Update</a>";
$this->content.="<a class='dropdown-item' href=".$this->router->deleteArticle($key).">DELETE</a></div></div></div>";
$this->content.="</div>";
$this->content.="</div></div>";

$this->content.="<div class='card-body'>";
$this->content.="<p class='card-text' style='color:black'>";
$this->content.=$value->getArticle();
$this->content.="</p>";
$this->content.="</div><div class='card-footer'><a href='#' class='card-link'><i class='fa fa-gittip'></i> Like</a>";
$this->content.="<a href='#' class='card-link'><i class='fa fa-comment'></i> Comment</a></div><br>";

}
}
if($img != null){

  foreach ($img as $key => $value){

    $this->content.="<div class='card-header'>";
    $this->content.="<div class='d-flex justify-content-between align-items-center'>";
    $this->content.="<div class='d-flex justify-content-between align-items-center'>";
    $this->content.="<div class='mr-2'>";

    $this->content.="<img class='rounded-circle' width='45' src='/projet_annuel/src/Style/images/profile.png' >";
    $this->content.="</div>";
    $this->content.="<div class='ml-2'>";
    $this->content.="<div class='h5 m-0'>".$value->getLoginImage()."</div> <div class='h7 text-muted'><img src='/projet_annuel/src/Style/images/map.png' width=8% height=8%> ".$value->getLocation()."</div>";
    $this->content.="</div><div><div class='dropdown'><button class='btn btn-link dropdown-toggle' type='button' id='gedf-drop1' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
    $this->content.="<i class='fa fa-ellipsis-h'></i></button><div class='dropdown-menu dropdown-menu-right' aria-labelledby='gedf-drop1'><a class='dropdown-item' href='#'>Update</a>";
    $this->content.="<a class='dropdown-item' href=".$this->router->deleteImage($key).">DELETE</a></div></div></div>";
    $this->content.="</div>";
    $this->content.="</div></div>";

    $this->content.="<div align='center'>";
    $this->content.="<img  src='/projet_annuel/src/Style/images/".$value->getLien()."'  width=80% height=80%>";
    $this->content.="</div><div class='card-footer'><a href='#' class='card-link'><i class='fa fa-gittip'></i> Like</a>";
    $this->content.="<a href='#' class='card-link'><i class='fa fa-comment'></i> Comment</a></div><br>";

  }
}

$this->content.="</div>";

}


public function getlog(){
  return $this->compte->getmob_email();
}
}

?>
