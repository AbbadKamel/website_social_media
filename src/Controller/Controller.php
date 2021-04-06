<?php

require_once "Model/Compte.php";
require_once "Model/CompteBuilder.php";

require_once "Model/Article.php";
require_once "Model/ArticleStorage.php";
require_once "Model/ArticleBuilder.php";

require_once "Model/Image.php";
require_once "Model/ImageStorage.php";
require_once "Model/ImageBuilder.php";

class Controller {

  private $view;
  private $comptedb;
  private $comptemysql;
  private $article;
  private $image;


  public function __construct($view,CompteStorage $comptedb,CompteStorageMysql $compte_mysql,ArticleStorage $article,ImageStorage $image){
    $this->view = $view;
    $this->comptedb = $comptedb;
    $this->compte_mysql =$compte_mysql;
    $this->article = $article;
    $this->image = $image;
}

  public function getLogin(){
    $this->view->Authentification();
  }


public function saveNewCompte(array $data){
  $comptebuilder = new CompteBuilder($data);
  $this->comptedb->create($comptebuilder->CreateCompte());
}

public function saveNewArticle(array $data){
  $articlebuilder = new ArticleBuilder($data);
  $this->article->createArticle($articlebuilder->createArticleBuilder(),$this->view->getlog());
}

public function getpagePrincipale(){
  $this->view->pagePrincipale($this->article->readAllArticle(),$this->image->readAllImage());
}

public function saveNewImage(array $data){
  $imagebuilder = new ImageBuilder($data);
  $this->image->createImage($imagebuilder->createImageBuilder(),$this->view->getlog());
}


public function deleteArticle($id){
  $this->article->deleteArticleBD($id);

}

public function deleteImage($id){
  $this->image->deleteImageBD($id);
}



}



?>
