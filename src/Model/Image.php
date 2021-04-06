<?php

class Image {
  private $lien;
  private $location;
  private $login;
  private $date_creation;


public function __construct($lien,$location,$login,$date_creation){
  $this->lien = $lien;
  $this->location = $location;
  $this->login = $login;
  $this->date_creation = $date_creation;
}

public function getLien(){
    return $this->lien;
}


public function getLocation(){
    return $this->location;
}


public function getDateCreation(){
    return $this->date_creation;
}

public function getLoginImage(){
  return $this->login;
}

}








?>
