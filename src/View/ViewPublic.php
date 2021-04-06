<?php

require_once "Router.php";
require_once "src/Model/Compte.php";

Class ViewPublic{
  protected $title;
  protected $content;
  protected $router;
  protected $feedback;

  public function __construct(Router $router){
    $this->title =null;
    $this->content = null;
    $this->router = $router;
  }

  public function render(){

      $title= $this->title;
      $c=1;
      $content = $this->content;
      include "template.php";

  }


    public function Authentification(){
      $this->title= "Authentification";

      $this->content .="<form action=".$this->router->getconnexion()." method='POST'>";

      $this->content .="<div class='form-group first'><label for='username'>Username</label>";
      $this->content .="<input type='text' class='form-control' id='username' name='login'></div>";

      $this->content .="<div class='form-group last mb-4'><label for='password'>Password</label>";
      $this->content .="<input type='password' class='form-control' id='password' name='password'></div>";

      $this->content .=" <div class='d-flex mb-5 align-items-center'><label class='control control--checkbox mb-0'><span class='caption'>Remember me</span>";
      $this->content .="<input type='checkbox' checked='checked' /><div class='control__indicator'></div></label>";
      $this->content .="<span class='ml-auto'><a href='#' class='forgot-pass'>Forgot Password</a></span></div>";

      $this->content .=" <input type='submit' value='Log In' class='btn btn-block btn-primary'><br></form>";

      //Button trigger modal
      $this->content .= "<button type='button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#exampleModal'> Sign Up </button>";
      $this->content .="<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
      $this->content .="<div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'>";

      $this->content .="<h4 class='modal-title' id='exampleModalLabel'>Register</h4><button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
      $this->content .="<span aria-hidden='true'>&times;</span></button></div><div class='modal-body'>";
      $this->content .="<form action=".$this->router->SaveNewCompte()." method='POST'>";
      $this->content .="<div class='form-group'><label for='inputAddress'>FULL NAME</label><input type='text' class='form-control' id='inputAddress' name=".CompteBuilder::NOM."></div>";
      $this->content .="<br><div class='form-group'><label for='inputEmail4'>Email</label><input type='email' class='form-control' id='inputEmail4' name=".CompteBuilder::MOBEMAIL."></div>";
      $this->content .="<br><div class='form-group'><label for='inputPassword4'>Password</label><input type='password' class='form-control' id='inputPassword4' name=".CompteBuilder::PASSWORD."></div><br>";

      $this->content .="<div class='custom-control custom-radio custom-control-inline'><input type='radio' id='customRadioInline1' class='custom-control-input' value='HOMME' name=".CompteBuilder::GENRE.">";
      $this->content .="<label class='custom-control-label' for='customRadioInline1'>HOMME</label></div>";
      $this->content .="<div class='custom-control custom-radio custom-control-inline'><input type='radio' id='customRadioInline2' class='custom-control-input' value='FEMME' name=".CompteBuilder::GENRE.">";
      $this->content .="<label class='custom-control-label' for='customRadioInline2'>FEMME</label></div><br>";
      $this->content .=" <div class='modal-footer'><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button><button type='submit' class='btn btn-primary'>Sign UP</button></div></form>";
    }

  }

?>
