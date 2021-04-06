<?php

class Article {
  private $article;
  private $location;
  private $date_creation;
  private $login;

public function __construct($article,$location,$login,$date_creation){
  $this->article = $article;
  $this->location = $location;
  $this->date_creation = $date_creation;
  $this->login = $login;
}

public function getArticle(){
    return $this->article;
}


public function getLocation(){
    return $this->location;
}


public function getDateCreation(){
    return $this->date_creation;
}

public function getLoginArticle(){
  return $this->login;
}

}








?>
