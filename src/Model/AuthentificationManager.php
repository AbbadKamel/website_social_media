<?php

class AuthentificationManager {
  private $auth;
  private $error;


  public function __construct(Array $auth){
    $this->auth = $auth;
    $this->error= array();
  }

  public function geterror(){
    return $this->error;
  }


  //La fonction de la connexion a l'app
  public function connectUser($login,$password){
    foreach($this->auth as $key =>$value){
      if($login == $value->getmob_email()){
        if(password_verify($value->getpass(), $password)) {
          $_SESSION[$value->getmode()] = $value;
          return true;
        }
      }
    }
    return false;
  }

  //si l'utilisateur qui est connecter session['user']
  public function isUserconnecter(){
    if(key_exists("user",$_SESSION)){
      return true;
  }
    else{
      return false;
    }
  }


  //Methode de déconnecter
  public function Deconnecter(){
      $_SESSION =array();
  }

}


?>
