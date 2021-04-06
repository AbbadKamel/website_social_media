<?php

require_once "View/ViewPublic.php";
require_once "View/ViewPrive.php";
require_once "Controller/Controller.php";
require_once "Model/CompteStorage.php";
require_once "Model/AuthentificationManager.php";
require_once "Model/ArticleStorage.php";

class Router{

public function main($compte_bd,ArticleStorage $article,ImageStorage $image){
  session_start();
  $compte_mysql = new CompteStorageMysql($compte_bd->getbd());
  $auth = new AuthentificationManager($compte_mysql->readUser());

  if($auth->isUserconnecter()){
    $view = new ViewPrive($this,$_SESSION['user']);
  }
  else {
    $view = new ViewPublic($this);
  }

  $con = new Controller($view,$compte_bd,$compte_mysql,$article,$image);

  $action = key_exists('action', $_GET)? $_GET['action']: null;

      if(key_exists("PATH_INFO",$_SERVER)){
         $tab = explode('/',$_SERVER["PATH_INFO"]);
         $case1 = count($tab);
      //le cas lorsqu'on envoie un seul parametres
      if($case1 == 2){
        $action = htmlspecialchars($tab[1]);
        switch ($action) {

        case "getSaveNewCompte" :
          $con->SaveNewCompte($_POST);break;

        case "GetPageAuth":
          if($auth->isUserconnecter() == FALSE){
            $con->getPageAuth($auth);
            break;
          }

        case "getauth":
          if($auth->connectUser($_POST["login"], password_hash($_POST["password"],PASSWORD_DEFAULT))){
             $this->POSTredirect("/projet_annuel/index.php","");
             break;
          }

        case "saveArticle":
          $con->saveNewArticle($_POST);
          $this->POSTredirect("/projet_annuel/index.php","");
          break;

        case "saveImage":
          $con->saveNewImage($_POST);
          $this->POSTredirect("/projet_annuel/index.php","");
          break;

          case "getDec" :
            if($auth->isUserconnecter() or $auth->isAdminconnected()){
              $auth->Deconnecter();
              $this->POSTredirect("/projet_annuel/index.php","");
              break;
            }
          }
        }

      if($case1 ==3){
        $action1 = htmlspecialchars($tab[1]);
        $action2 = htmlspecialchars($tab[2]);
        switch ($action2) {
          case "getdeleteArticle" :
          if(key_exists("user",$_SESSION)){
            $con->deleteArticle($action1,$_POST);break;
          }

          case "getdeleteImage" :
          if(key_exists("user",$_SESSION)){
            $con->deleteImage($action1,$_POST);break;
          }
        }
      }
    }
      if($auth->isUserconnecter() == FALSE){
        $con->getLogin();
      }
      else {
        $con->getpagePrincipale();
      }
        $view->render();
    }

public function  POSTredirect($url,$feedback){
$_SESSION['feedback'] = $feedback;
  header("Location:".$url, true, 303);
}

public function getDeconnecte(){
  return "/projet_annuel/index.php/getDec";
}

public function SaveNewCompte(){
  return "/projet_annuel/index.php/getSaveNewCompte";
}

public function getconnexion(){
  return "/projet_annuel/index.php/getauth";
}

public function addArticle(){
  return "/projet_annuel/index.php/saveArticle";
}

public function addImage(){
  return "/projet_annuel/index.php/saveImage";
}

public function deleteArticle($id){
  return "/projet_annuel/index.php/".$id."/getdeleteArticle";
}

public function deleteImage($id){
  return "/projet_annuel/index.php/".$id."/getdeleteImage";
}



}


?>
